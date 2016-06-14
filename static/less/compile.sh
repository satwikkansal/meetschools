#!/bin/bash
start_directory="$(pwd)"

get_imported_files () {
    new_less_file=$1
    local current_directory=$(dirname $new_less_file);

    if [ $less_file_index -eq 0 ] 
    then
        master_less_file=$new_less_file
        final_css_file=$(echo $master_less_file | sed "s/less/css/g")

        less_file_array[$less_file_index]=$master_less_file
        less_file_index=$((less_file_index+1))
    fi

    while read line
    do
    if [[ "$line" =~ "@import" ]]; then
        line=${line##*@import}
        line=${line// }
        line=${line%% }
        line=${line%%;}
        line=${line// }
        line=${line%% }
        line=${line//\'}
        line=${line%%\'}
        line=${line//\"}
        line=${line%%\"}

        less_file_array[$less_file_index]=$current_directory/$line
        less_file_index=$((less_file_index+1))

        get_imported_files $current_directory/$line
    fi
    done < $new_less_file

    return 0
}

compile () {
    get_imported_files $1
    latest_less_file=${less_file_array[0]}
    for f in ${less_file_array[@]}
    do
        if [ "$latest_less_file" -ot "${f}" ]
        then
            latest_less_file=${f}
        fi
    done
    if [ "$final_css_file" -ot "$latest_less_file" ]
    then
        FROM=$master_less_file
        TO=$final_css_file
        TO_DIRNAME=$(dirname $TO)
        if [ ! -e $TO_DIRNAME ];then
            mkdir -p $TO_DIRNAME
        fi
        lessc -x $FROM > $TO

        echo $TO Created
        touch $final_css_file -r $latest_less_file
    fi
}

find . -name '*.less' -printf '%P\n' | while read name; do
    less_file_index=0
    less_file_array=()
    if [[ $name == "includes"* ]]
    then
        continue
    fi
    compile $start_directory/$name
done