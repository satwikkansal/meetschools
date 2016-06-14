<?php

Use Meetschools\Helpers\Utils;

global $CI;
?>

<!-- CSS Page Style -->
<link rel="stylesheet" href="/static/css/pages/page_search_inner.css">
<link rel="stylesheet" href="/static/css/pages/page_search_custom.css">


<!--=== Breadcrumbs ===-->
<div class="breadcrumbs breadcrumbs-dark">
    <div class="container">
        <h1 class="pull-left">Search Results</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Page</a></li>
            <li class="active">Search results</li>
        </ul>
    </div>
</div>
<!--=== End Breadcrumbs ===-->

<!--=== Search Block Version 2 ===-->
<div class="search-block-v2">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h2>Search again</h2>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search words with regular expressions ...">
                <span class="input-group-btn">
                    <button class="btn-u" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
    </div>
</div><!--/container-->
<!--=== End Search Block Version 2 ===-->

<!--=== Search Results ===-->
<div class="container s-results margin-bottom-50">
    <div class="row">
        <div class="col-md-3 hidden-xs related-search">
            <div class="row">
                <div class="col-md-12 col-sm-4">
                    <h3>Top Schools in states</h3>
                    <ul class="list-unstyled">
                        <li><a href="/school/search/state-kerala">Top Schools in Kerala</a></li>
                        <li><a href="/school/search/state-karnataka">Top Schools in Karnataka</a></li>
                        <li><a href="/school/search/state-haryana">Top Schools in Haryana</a></li>
                    </ul>
                    <hr>
                </div>


                <div class="col-md-12 col-sm-4">
                    <h3>Fees</h3>
                    <ul class="list-unstyled">
                        <li><label for="ui-multiselect-fees-option-1" >
                                <input type="checkbox" id="ui-multiselect-fees-option-1" name="multiselect_fees"  value="1"  />
                                <span>
                                    <i class="fa fa-inr"></i>
                                </span>
                                <span class="fdetail">10000</span>
                            </label>
                        </li>
                        <li><label for="ui-multiselect-fees-option-2" >
                                <input type="checkbox" id="ui-multiselect-fees-option-2" name="multiselect_fees"  value="2" />
                                <span>
                                    <i class="fa fa-inr"></i>
                                </span>
                                <span class="fdetail">20000</span>
                            </label>
                        </li>
                        <li><label for="ui-multiselect-fees-option-4">
                                <input type="checkbox" id="ui-multiselect-fees-option-4" name="multiselect_fees"  value="4" />
                                <span>
                                    <i class="fa fa-inr"></i>
                                </span>
                                <span class="fdetail">50000</span>
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>School Type</h3>
                    <ul class="list-unstyled">
                        <li>
                            <label for="ui-multiselect-schtype-option-1">
                                <input id="ui-multiselect-schtype-option-1" name="multiselect_schtype" value="Boys" type="checkbox">
                                <span>
                                    Boys  <i class="fa fa-male fa-lg"></i>
                                </span>
                                <span class="schtypedetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-schtype-option-2">
                                <input id="ui-multiselect-schtype-option-2" name="multiselect_schtype" value="Girls" type="checkbox">
                                <span>
                                    Girls <i class="fa fa-female fa-lg"></i>
                                </span>
                                <span class="schtypedetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-schtype-option-3">
                                <input id="ui-multiselect-schtype-option-3" name="multiselect_schtype" value="Coeducational" type="checkbox">
                                <span>
                                    Co-Educational <i class="fa fa-male fa-lg"></i><i class="fa fa-female fa-lg"></i>
                                </span>
                                <span class="schtypedetail">&nbsp;</span>
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>School Management</h3>
                    <ul class="list-unstyled">
                        <li>
                            <label for="ui-multiselect-schmgmt-option-1" >
                                <input type="checkbox" id="ui-multiselect-schmgmt-option-1" name="multiselect_schmgmt"  value="1"  />
                                <span>
                                    Govt. Aided 
                                </span>
                                <span class="schmgmtdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-schmgmt-option-2" >
                                <input type="checkbox" id="ui-multiselect-schmgmt-option-2" name="multiselect_schmgmt"  value="2" />
                                <span>
                                    Unaided
                                </span>
                                <span class="schmgmtdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-schmgmt-option-3">
                                <input type="checkbox" id="ui-multiselect-schmgmt-option-3" name="multiselect_schmgmt"  value="3" />
                                <span>
                                    Private
                                </span>
                                <span class="schmgmtdetail">&nbsp;</span>
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>Medium</h3>
                    <ul class="list-unstyled">
                        <li>
                            <select tabindex="-1" id="medium" style="width: 98%;" multiple="">
                                <option value="English">English</option><option value="Gujarati">Gujarati</option><option value="Marathi">Marathi</option><option value="Hindi">Hindi</option><option value="Tamil">Tamil</option><option value="Kannada">Kannada</option><option value="Telugu">Telugu</option><option value="Urdu">Urdu</option><option value="Konkani">Konkani</option><option value="Manipuri">Manipuri</option></select>
                        </li>

                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>Board</h3>
                    <ul class="list-unstyled">
                        <li>
                            <label for="ui-multiselect-board-option-1">
                                <input name="multiselect_board" id="ui-multiselect-board-option-1" value="CBSE" type="checkbox">
                                <span>
                                    CBSE
                                </span>
                                <span class="bdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-board-option-2">
                                <input name="multiselect_board" id="ui-multiselect-board-option-2" value="State-Board" type="checkbox">
                                <span>
                                    State Board
                                </span>
                                <span class="bdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-board-option-3">
                                <input name="multiselect_board" id="ui-multiselect-board-option-3" value="ICSE" type="checkbox">
                                <span>
                                    ICSE
                                </span>
                                <span class="bdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-board-option-4">
                                <input name="multiselect_board" id="ui-multiselect-board-option-4" value="IB" type="checkbox">
                                <span>
                                    IB
                                </span>
                                <span class="bdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-board-option-5">
                                <input name="multiselect_board" id="ui-multiselect-board-option-5" value="IGCSE" type="checkbox">
                                <span>
                                    IGCSE
                                </span>
                                <span class="bdetail">&nbsp;</span>
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>Location</h3>
                    <ul class="list-unstyled">
                        <li>
                            <select tabindex="-1" id="locality" style="width: 98%;" multiple="">



                                <option value="Bhosari">Bhosari</option>


                                <option value="Yerwada">Yerwada</option>


                                <option value="Bhor">Bhor</option>


                                <option value="Pimpri">Pimpri</option>


                                <option value="Khed">Khed</option>


                                <option value="Talegaon">Talegaon</option>


                                <option value="Kothrud">Kothrud</option>


                                <option value="Fatima-Nagar">Fatima Nagar</option>


                                <option value="Purandar">Purandar</option>


                                <option value="Pashan">Pashan</option>


                                <option value="Pune-City">Pune City</option>


                                <option value="Shivaji-Nagar">Shivaji Nagar</option>


                                <option value="Bavdhan">Bavdhan</option>


                                <option value="Landewadi">Landewadi</option>


                                <option value="Maval">Maval</option>


                                <option value="Kharadi">Kharadi</option>


                                <option value="Pimple-Saudagar">Pimple Saudagar</option>


                                <option value="Akurdi">Akurdi</option>


                                <option value="Nigdi">Nigdi</option>


                                <option value="Camp">Camp</option>


                                <option value="Aundh">Aundh</option>


                                <option value="Baramati">Baramati</option>


                                <option value="Indapur">Indapur</option>


                                <option value="Kondhwa">Kondhwa</option>


                                <option value="Bibewadi">Bibewadi</option>


                                <option value="Junnar">Junnar</option>


                                <option value="Lonavala">Lonavala</option>


                                <option value="Balewadi">Balewadi</option>


                                <option value="Kalyani-Nagar">Kalyani Nagar</option>


                                <option value="Swargate">Swargate</option>


                                <option value="Wagholi">Wagholi</option>


                                <option value="Hadapsar">Hadapsar</option>


                                <option value="Koregaon-Park">Koregaon Park</option>


                                <option value="Mulshi">Mulshi</option>


                                <option value="Katraj">Katraj</option>


                                <option value="Dehu">Dehu</option>


                                <option value="Daund">Daund</option>


                                <option value="Wanwadi">Wanwadi</option>


                                <option value="Haveli">Haveli</option>


                                <option value="Khadki">Khadki</option>


                                <option value="Hinjewadi">Hinjewadi</option>


                                <option value="Dhayari">Dhayari</option>


                                <option value="Deccan">Deccan</option>


                                <option value="Baner">Baner</option>


                                <option value="Viman-Nagar">Viman Nagar</option>


                                <option value="Chinchwad">Chinchwad</option>


                                <option value="Lohegaon">Lohegaon</option>


                                <option value="Shirur">Shirur</option>


                                <option value="Velhe">Velhe</option>


                                <option value="Ambegaon">Ambegaon</option>


                                <option value="Pcmc">Pcmc</option>


                                <option value="Wakad">Wakad</option>


                            </select>
                        </li>
                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>Facilities</h3>
                    <ul class="list-unstyled">
                        <li>
                            <label for="ui-multiselect-facility-option-1">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-1" value="Medical" type="checkbox">
                                <span>
                                    Medical
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-2">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-2" value="Sports" type="checkbox">
                                <span>
                                    Sports
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-3">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-3" value="Computer" type="checkbox">
                                <span>
                                    Computer
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-4">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-4" value="Library" type="checkbox">
                                <span>
                                    Library
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-5">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-5" value="Canteen" type="checkbox">
                                <span>
                                    Canteen
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-6">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-6" value="Transport" type="checkbox">
                                <span>
                                    Transport
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-7">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-7" value="Handicap" type="checkbox">
                                <span>
                                    Handicap
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-8">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-8" value="AC-Classes" type="checkbox">
                                <span>
                                    A/C Classes
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-9">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-9" value="Smart-Education" type="checkbox">
                                <span>
                                    Smart Education
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                        <li>
                            <label for="ui-multiselect-facility-option-10">
                                <input name="multiselect_facility" id="ui-multiselect-facility-option-10" value="Hostel" type="checkbox">
                                <span>
                                    Hostel 
                                </span>
                                <span class="mdetail">&nbsp;</span>
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>



            </div>
        </div>


        <div class="col-md-9">
            <?php $CI->load->view('school/search/school_list'); ?>

        </div><!--/col-md-9-->
    </div>
</div><!--/container-->
<!--=== End Search Results ===-->
