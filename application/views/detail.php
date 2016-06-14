<?php
$school = isset($data->school) ? $data->school : NULL;
?>

<link rel="stylesheet" href="/static/plugins/scrollbar/css/jquery.mCustomScrollbar.css">

<!-- CSS Page Style -->
<link rel="stylesheet" href="/static/css/pages/profile.css">
<!--<link rel="stylesheet" href="/static/css/pages/star-rating.css">-->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<!--=== Profile ===-->
<div class="container content profile">
    <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-3 md-margin-bottom-40">

            <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                <li class="list-group-item">
                    <a href="#about"><i class="fa fa-align-center"></i> About</a>
                </li>
                <li class="list-group-item">
                    <a href="#rate"><i class="fa fa-star"></i> Rate</a>
                </li>

                <li class="list-group-item">
                    <a href="#reviews"><i class="fa fa-star"></i> Reviews</a>
                </li>
                <!--                <li class="list-group-item">
                                    <a href="#"><i class="fa fa-group"></i> Teachers</a>
                                </li>-->
                <li class="list-group-item">
                    <a href="#infrastructure"><i class="fa fa-university"></i> Infrastructure</a>
                </li>
                <!--                <li class="list-group-item">
                                    <a href="#"><i class="fa fa-inr"></i> Fees</a>
                                </li>-->


                <li class="list-group-item">
                    <a href="#teachers"><i class="fa fa-graduation-cap"></i> Teachers</a>
                </li>
                <li class="list-group-item">
                    <a href="#alumini"><i class="fa fa-graduation-cap"></i> Alumni</a>
                </li>
                <li class="list-group-item">
                    <a href="#students"><i class="fa fa-graduation-cap"></i> Students</a>
                </li>
                <li class="list-group-item">
                    <a href="#contact"><i class="fa fa-envelope"></i> Contact</a>
                </li>
            </ul>
        </div>
        <!--End Left Sidebar-->

        <!-- Profile Content -->
        <div class="col-md-9">
            <div class="profile-body">



                <!--Profile Blog-->

                <div class="row" id="about">
                    <div class="col-sm-12">
                        <div class="profile-blog blog-border">
                            <div class="name-location">
                                <strong><?= $school->name() ?></strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                            </div>
                            <div class="clearfix margin-bottom-10"></div>

                            <div class="col-md-6 no-padding">
                                <div class="medium">
                                    <div class="medium-lable">
                                        <span>Board</span>
                                    </div>
                                    <div class="medium-content">
                                        <span>
                                            <a class="search-result-anchor" href="/schools/Pune/IB ">IB</a> 
                                            , <a class="search-result-anchor" href="/schools/Pune/IGCSE ">IGCSE</a> 
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 no-padding">
                                <div class="medium">
                                    <div class="medium-lable">
                                        <span>Grade Level</span>
                                    </div>
                                    <div class="medium-content">
                                        <span>
                                            <a class="search-result-anchor" href="/schools/Pune/IB ">Senior Secondary</a> 
                                        </span>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 no-padding">
                                <div class="medium">
                                    <div class="medium-lable">
                                        <span>Category</span>
                                    </div>
                                    <div class="medium-content">
                                        <span>
                                            <a class="search-result-anchor" href="/schools/Pune/English ">Co-educational</a>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 no-padding">
                                <div class="medium">
                                    <div class="medium-lable">
                                        <span>Year Founded</span>
                                    </div>
                                    <div class="medium-content">
                                        <span>
                                            <a class="search-result-anchor" href="/schools/Pune/English ">1968</a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 no-padding">
                                <div class="medium">
                                    <div class="medium-lable">
                                        <span>Medium</span>
                                    </div>
                                    <div class="medium-content">
                                        <span>
                                            <a class="search-result-anchor" href="/schools/Pune/English ">English</a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 no-padding">
                                <div class="medium">
                                    <div class="medium-lable">
                                        <span>Type</span>
                                    </div>
                                    <div class="medium-content">
                                        <span>
                                            <a class="search-result-anchor" href="/schools/Pune/English ">Independent</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-eye"></i><a href="#">12</a></li>
                                <li><i class="fa fa-group"></i><a href="#">54 Teachers</a></li>
                                <li><i class="fa fa-group"></i><a href="#">54 Students</a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <!--End Profile Blog-->



                <hr>


                <!--Profile Blog-->
                <div class="panel panel-profile" id="rate">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-star"></i> Rate <?= $school->name(); ?></h2>
                    </div>
                    <div class="panel-body">
                        <form class="sky-form" action="">
                            <fieldset>
                                <section class="col col-6">
                                    <div class="rating">
                                        <input type="radio" name="stars-rating" id="stars-rating-5">
                                        <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-4">
                                        <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-3">
                                        <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-2">
                                        <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-1">
                                        <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                                        Academic Score
                                    </div>

                                    <div class="rating">
                                        <input type="radio" name="stars-rating" id="stars-rating-5">
                                        <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-4">
                                        <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-3">
                                        <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-2">
                                        <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-1">
                                        <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                                        Extra-Curricular Score
                                    </div>
                                </section>
                                <section class="col col-6">
                                    <div class="rating">
                                        <input type="radio" name="stars-rating" id="stars-rating-5">
                                        <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-4">
                                        <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-3">
                                        <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-2">
                                        <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-1">
                                        <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                                        Infrastructure Score
                                    </div>

                                    <div class="rating">
                                        <input type="radio" name="stars-rating" id="stars-rating-5">
                                        <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-4">
                                        <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-3">
                                        <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-2">
                                        <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="stars-rating" id="stars-rating-1">
                                        <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                                        Administration Score
                                    </div>

                                </section>
                            </fieldset>

                            <br>
                            <div class="row no-bottom">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <label for="comment">Review:</label>
                                    <textarea class="form-control" name="review" rows="5" id="comment" style="width:100%;" placeholder="Tell us more about your school !"></textarea>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-8 col-xs-offset-1">
                                    <select class="selectpicker bs-select-hidden" title="Rate As" name="whoisthis"><option value="" class="bs-title-option">Rate As</option>
                                        <option value="student">Student</option>
                                        <option value="alumnus">Alumnus</option>
                                        <option value="parent">Parent</option>
                                        <option value="teacher">Teacher</option>
                                    </select><div class="btn-group bootstrap-select dropup"><button aria-expanded="false" title="Parent" type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"><span class="filter-option pull-left">Parent</span>&nbsp;<span class="caret"></span></button><div style="max-height: 544.4px; overflow: hidden; min-height: 92px;" class="dropdown-menu open"><ul style="max-height: 532.4px; overflow-y: auto; min-height: 80px;" class="dropdown-menu inner" role="menu"><li class="" data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Student</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li class="" data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Alumnus</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li class="selected" data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Parent</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Teacher</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>
                                    <br><br>
                                    <button type="submit" class="btn btn-primary btn">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Profile Blog-->


                <hr>


                <div class="panel panel-profile" id="reviews">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments"></i>Users Reviews</h2>
                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                    </div>
                    <div class="panel-body margin-bottom-50">
                        <div class="row">
                            <div class="col-md-3 center">
                                <p>Academic Score<br><div class="star-rating rating-xs rating-disabled"><div data-content="" class="rating-container rating-fa"><div style="width: 90%;" data-content="" class="rating-stars"></div><input id="input-2c" name="academic_infra" value="4.5" class="rating form-control hide" min="0" max="5" step="0.5" data-size="xs" data-symbol="" data-glyphicon="false" data-rating-class="rating-fa" disabled="" type="number"></div><div class="caption"><span class="label label-success">Excellent</span></div></div></p>
                            </div>
                            <div class="col-md-3 center">
                                <p>Infrastructure Score<br><div class="star-rating rating-xs rating-disabled"><div data-content="" class="rating-container rating-fa"><div style="width: 90%;" data-content="" class="rating-stars"></div><input id="input-2c" name="sports_infra" value="4.5" class="rating form-control hide" min="0" max="5" step="0.5" data-size="xs" data-symbol="" data-glyphicon="false" data-rating-class="rating-fa" disabled="" type="number"></div><div class="caption"><span class="label label-success">Excellent</span></div></div></p>
                            </div>
                            <div class="col-md-3 center">
                                <p>Administration Score<br><div class="star-rating rating-xs rating-disabled"><div data-content="" class="rating-container rating-fa"><div style="width: 90%;" data-content="" class="rating-stars"></div><input id="input-21e" name="staff_management" value="4.5" class="rating form-control hide" min="0" max="5" step="0.5" data-size="xs" data-symbol="" data-glyphicon="false" data-rating-class="rating-fa" disabled="" type="number"></div><div class="caption"><span class="label label-success">Excellent</span></div></div></p>
                            </div>
                            <div class="col-md-3 center">
                                <p>Extra-Curricular Score<br><div class="star-rating rating-xs rating-disabled"><div data-content="" class="rating-container rating-fa"><div style="width: 80%;" data-content="" class="rating-stars"></div><input id="input-2c" name="cultural_extra" value="4.0" class="rating form-control hide" min="0" max="5" step="0.5" data-size="xs" data-symbol="" data-glyphicon="false" data-rating-class="rating-fa" disabled="" type="number"></div><div class="caption"><span class="label label-primary">Very Good</span></div></div></p>
                            </div>                 
                        </div>
                        <div class="media media-v2">
                            <a class="pull-left" href="#">
                                <img class="media-object rounded-x" src="/static/img/testimonials/img2.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <strong><a href="#">Eva Nelson</a></strong> @EvaNelson
                                    <small>About an hour ago</small>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada rhoncus tellus blandit facilisis. Morbi faucibus eros facilisis vulputate mollis. Mauris sodales ante lorem, sed fringilla orci rhoncus ac. Donec sit amet eros at libero egestas interdum non quis libero.</p>
                                <ul class="list-inline results-list pull-left">
                                    <li><a href="#">25 Likes</a></li>
                                    <li><a href="#">10 Share</a></li>
                                </ul>
                                <ul class="list-inline pull-right">
                                    <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                    <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                </ul>
                            </div>
                        </div><!--/end media media v2-->
                        <div class="media media-v2 margin-bottom-20">
                            <a class="pull-left" href="#">
                                <img class="media-object rounded-x" src="/static/img/testimonials/img3.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <strong><a href="#">Frank Lennon</a></strong> @FLennon
                                    <small>4 hours ago</small>
                                </h4>
                                <p>I'm incredibly excited to announce that I am joining the amazing <a href="#">@Unify</a> team. To be in touch with the latest update, Sign up and get your own Account page fee free :) Like mine: <a href="#">http://www.unify.com/flennon</a></p>
                                <ul class="list-inline results-list pull-left">
                                    <li><a href="#">5 Likes</a></li>
                                    <li><a href="#">1 Share</a></li>
                                </ul>
                                <ul class="list-inline pull-right">
                                    <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                    <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                </ul>

                                <div class="clearfix"></div>

                                <div class="media media-v2">
                                    <a class="pull-left" href="#">
                                        <img class="media-object rounded-x" src="/static/img/testimonials/img7.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <strong><a href="#">Edward Rooster</a></strong> @EdwardRooster
                                            <small>5 hours ago</small>
                                        </h4>
                                        <p>Welcome to Board! :) Your journey starts here. Wish you all the best!</p>
                                        <ul class="list-inline results-list pull-left">
                                            <li><a href="#">0 Likes</a></li>
                                            <li><a href="#">0 Share</a></li>
                                        </ul>
                                        <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                            <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!--/end media media v2-->
                        <button type="button" class="btn-u btn-u-default btn-block">Load More</button>
                    </div>
                </div>

                <hr>


                <!--Profile Blog-->
                <div class="panel panel-profile" id="infrastructure">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-university"></i> Infrastructure</h2>

                    </div>
                    <div class="panel-body">
                        <table class="table table-condensed padded-icon">
                            <thead>
                                <tr>
                                    <th>Facility</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody><tr class="danger">
                                    <td><i class="material-icons hidden-xs">pool</i>Swimming Pool</td>
                                    <td>
                                        <i class="material-icons" style="color:#dd2c00;">close</i>
                                    </td>
                                </tr>
                                <tr class="danger">
                                    <td><i class="material-icons hidden-xs">directions_walk</i>Dance Room</td>
                                    <td>
                                        <i class="material-icons" style="color:#dd2c00;">close</i>
                                    </td>
                                </tr>
                                <tr class="danger">
                                    <td><i class="material-icons hidden-xs">directions_bike</i>Gym</td>
                                    <td>
                                        <i class="material-icons" style="color:#dd2c00;">close</i>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td><i class="material-icons hidden-xs">headset</i>Music Room</td>
                                    <td>
                                        <i class="material-icons" style="color:#2e7d32;">done</i>
                                    </td>
                                </tr>
                                <tr class="danger">
                                    <td><i class="material-icons hidden-xs">home</i>Hostel</td>
                                    <td>
                                        <i class="material-icons" style="color:#dd2c00;">close</i>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td><i class="material-icons hidden-xs">local_hospital</i>Medical Facility</td>
                                    <td>
                                        <i class="material-icons" style="color:#2e7d32;">done</i>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td><i class="material-icons hidden-xs">videogame_asset</i>Indoor Games</td>
                                    <td>
                                        <i class="material-icons" style="color:#2e7d32;">done</i>
                                    </td>
                                </tr>
                                <tr class="danger">
                                    <td><i class="material-icons hidden-xs">computer</i>Computer Aided Learning</td>
                                    <td>
                                        <i class="material-icons" style="color:#dd2c00;">close</i>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td><i class="material-icons hidden-xs">library_books</i>Library</td>
                                    <td>
                                        <i class="material-icons" style="color:#2e7d32;">done</i>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td><i class="material-icons hidden-xs">golf_course</i>Playground</td>
                                    <td>
                                        <i class="material-icons" style="color:#2e7d32;">done</i>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td><i class="material-icons hidden-xs">accessible</i>Ramps</td>
                                    <td>
                                        <i class="material-icons" style="color:#2e7d32;">done</i>
                                    </td>
                                </tr>                          

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--End Profile Blog-->

                <hr>



                <!--Profile Blog-->
                <div class="panel panel-profile" id="teachers">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-university"></i> Teachers</h2>

                    </div>
                    <div class="panel-body">
                        <div class="table-search-v2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>User Image</th>
                                            <th class="hidden-sm">About</th>
                                            <th>Status</th>
                                            <th>Contacts</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img class="rounded-x" src="/static/img/testimonials/img1.jpg" alt="">
                                            </td>
                                            <td class="td-width">
                                                <h3><a href="#">Sed nec elit arcu</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                                <small class="hex">Joined February 28, 2014</small>
                                            </td>
                                            <td>
                                                <span class="label label-success">Success</span>
                                            </td>
                                            <td>
                                                <ul class="list-inline s-icons">
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                            <i class="fa fa-dropbox"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                            <i class="fa fa-linkedin"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span><a href="#">info@example.com</a></span>
                                                <span><a href="#">www.htmlstream.com</a></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="rounded-x" src="/static/img/testimonials/img2.jpg" alt="">
                                            </td>
                                            <td>
                                                <h3><a href="#">Donec at aliquam est, a mattis mauris</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                                <small class="hex">Joined March 2, 2014</small>
                                            </td>
                                            <td>
                                                <span class="label label-info"> Pending</span>
                                            </td>
                                            <td>
                                                <ul class="list-inline s-icons">
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                            <i class="fa fa-dropbox"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                            <i class="fa fa-linkedin"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span><a href="#">info@example.com</a></span>
                                                <span><a href="#">www.htmlstream.com</a></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="rounded-x" src="/static/img/testimonials/img3.jpg" alt="">
                                            </td>
                                            <td>
                                                <h3><a href="#">Pellentesque semper tempus vehicula</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                                <small class="hex">Joined March 3, 2014</small>
                                            </td>
                                            <td>
                                                <span class="label label-warning">Expiring</span>
                                            </td>
                                            <td>
                                                <ul class="list-inline s-icons">
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                            <i class="fa fa-dropbox"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                            <i class="fa fa-linkedin"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span><a href="#">info@example.com</a></span>
                                                <span><a href="#">www.htmlstream.com</a></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="rounded-x" src="/static/img/testimonials/img4.jpg" alt="">
                                            </td>
                                            <td>
                                                <h3><a href="#">Alesuada fames ac turpis egestas</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                                <small class="hex">Joined March 4, 2014</small>
                                            </td>
                                            <td>
                                                <span class="label label-danger">Error!</span>
                                            </td>
                                            <td>
                                                <ul class="list-inline s-icons">
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                            <i class="fa fa-dropbox"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                            <i class="fa fa-linkedin"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span><a href="#">info@example.com</a></span>
                                                <span><a href="#">www.htmlstream.com</a></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Profile Blog-->

                <hr>

                <!--Profile Blog-->
                <div class="panel panel-profile" id="alumini">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-graduation-cap"></i> Alumini</h2>
                        <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="profile-blog blog-border">
                                    <img class="rounded-x" src="/static/img/testimonials/img1.jpg" alt="">
                                    <div class="name-location">
                                        <strong>Mikel Andrews</strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                                        <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="profile-blog blog-border">
                                    <img class="rounded-x" src="/static/img/testimonials/img4.jpg" alt="">
                                    <div class="name-location">
                                        <strong>Natasha Kolnikova</strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                                        <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Profile Blog-->

                <hr>

                <!--Profile Blog-->
                <div class="panel panel-profile" id="students">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-graduation-cap"></i> Students</h2>
                        <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="profile-blog blog-border">
                                    <img class="rounded-x" src="/static/img/testimonials/img1.jpg" alt="">
                                    <div class="name-location">
                                        <strong>Mikel Andrews</strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                                        <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="profile-blog blog-border">
                                    <img class="rounded-x" src="/static/img/testimonials/img4.jpg" alt="">
                                    <div class="name-location">
                                        <strong>Natasha Kolnikova</strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                                        <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Profile Blog-->

                <hr>

                <div class="row" id="contact">
                    <!--Social Contacts v2-->
                    <div class="col-sm-6">
                        <div class="panel panel-profile">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Social Contacts</h2>

                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled social-contacts-v3">
                                    <li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">meetschools</a></li>
                                    <li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">meetschools</a></li>
                                    <li><i class="rounded-x sk fa fa-skype"></i> <a href="#">meetschools</a></li>
                                    <li><i class="rounded-x gp fa fa-google-plus"></i> <a href="#">meetschools</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Social Contacts v2-->

                    <!--Design Skills-->
                    <div class="col-sm-6">
                        <div class="panel panel-profile">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-envelope"></i> Contact</h2>

                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled who">
                                    <li><a href="#"><i class="fa fa-home"></i>5B Streat, City 50987 New Town US</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i>info@example.com</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i>1(222) 5x86 x97x</a></li>
                                    <li><a href="#"><i class="fa fa-globe"></i>http://www.example.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Design Skills-->
                </div><!--/end row-->

                <hr>

            </div>
        </div>
        <!-- End Profile Content -->
    </div>
</div><!--/container-->
<!--=== End Profile ===-->


<script type="text/javascript" src="/static/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/static/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="/static/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="/static/js/app.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        App.initScrollBar();
    });
</script>