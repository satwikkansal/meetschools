
<link rel="stylesheet" href="/static/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="/static/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
<link rel="stylesheet" href="/static/css/pages/profile.css">


<!--=== Profile ===-->
<div class="container content profile">
    <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-3 md-margin-bottom-40">
            <img class="img-responsive profile-img margin-bottom-20" src="https://cdn2.iconfinder.com/data/icons/professions/512/student_graduate_boy_profile-512.png" alt="">

            <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                <li class="list-group-item">
                    <a href="/student/dashboard"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
                </li>
                <li class="list-group-item">
                    <a href="/student/my_teachers"><i class="fa fa-group"></i> My Teachers</a>
                </li>
                <li class="list-group-item">
                    <a href="/student/my_classmates"><i class="fa fa-cubes"></i> My Classmates</a>
                </li>
                <li class="list-group-item active">
                    <a href="/student/complaints"><i class="fa fa-comments"></i> Complaints</a>
                </li>
                <li class="list-group-item">
                    <a href="/student/suggestions"><i class="fa fa-history"></i> Suggestions</a>
                </li>
                <li class="list-group-item">
                    <a href="/student/settings"><i class="fa fa-cog"></i> Settings</a>
                </li>
            </ul>
        </div>
        <!--End Left Sidebar-->

        <!-- Profile Content -->
        <div class="col-md-9">
            <div class="profile-body">
                <div class="panel panel-profile">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments"></i>My Complaints</h2>
                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                    </div>
                    <div class="panel-body margin-bottom-50">
                        <div class="media media-v2">

                            <div class="media-body">

                                <p>Sample Complaint.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="margin-bottom-40"></div>
                <form action="#" method="post" id="sky-form5" class="sky-form">
                    <header>Submit your complaint below:</header>

                    <fieldset>
                        

                        <section>
                            <label class="label">Comment</label>
                            <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                <textarea rows="4" name="comment"></textarea>
                            </label>
                            <div class="note">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
                        </section>

                    </fieldset>

                    <footer>
                        <button type="submit" name="submit" class="button">Add comment</button>
                    </footer>

                    <div class="message">
                        <i class="rounded-x fa fa-check"></i>
                        <p>Your complaint was successfully added!</p>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Profile Content -->
    </div>
</div>
<!--=== End Profile ===-->

<script type="text/javascript" src="/static/plugins/circles-master/circles.js"></script>
<script type="text/javascript" src="/static/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/static/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript" src="/static/js/plugins/circles-master.js"></script>
