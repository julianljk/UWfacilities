<!DOCTYPE html>
<html> 
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/css/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/bootstrap-lightbox.min.css'); ?>">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
        <!--<script src="<?php //echo base_url('assets/js/bootstrap-lightbox.min.js');?>"></script>-->
       
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
    </head>
    
    <body>
        <div id="container" ng-app ng-controller="facCtrl">
            <h1>UW Facilities</h1>
            <div class="col-md-12" style="margin-bottom: 50px;">
                <div class="col-md-6">
                    <div class="col-md-3">
                        <input type="text" ng-model="id" />
                        <a href="#" ng-click="get(id)">GET</a> 
                    </div>
                    <div class="col-md-3">
                        <select ng-options="type.dept_name for type in FPM track by type.id" ng-model="FPMchoice" ng-change="updateLists('FPM')">
                            <option value="">&nbsp;</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select ng-options="type.academic_name for type in academics track by type.id" ng-model="academicChoice" ng-change="updateLists('academic')">
                            <option value="">&nbsp;</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select ng-options="type.org_name for type in stud_orgs track by type.org_id" ng-model="studentChoice" ng-change="updateLists('student')">
                            <option value="">&nbsp;</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div ng-show="items.length" class="col-md-12 results">
                        <div ng-repeat="item in items" style="width: 98%;padding: 0px 20px;">
                            <div class="row">
                                <h2>{{item.title}}</h2><br />
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    Sector Name
                                </div>
                                <div class="col-md-9">
                                    {{item.sector_name}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    Project Date
                                </div>
                                <div class="col-md-9">
                                    {{item.proj_date}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    Action
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.Action}}</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row" ng-if="item.findings != ''">
                                <div class="col-md-3">
                                    Notable Findings/Content
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.findings}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.findings != ''"></div>
                            <div class="row" ng-if="item.future_opp != ''">
                                <div class="col-md-3">
                                    Future Oppurtunities?
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.future_opp}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.future_opp != ''"></div>
                            <div class="row" ng-if="item.authors != ''">
                                <div class="col-md-3">
                                    Document Lead Authors/Project Contact
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.authors}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.authors != ''"></div>
                            <div class="row" ng-if="item.dept_name">
                                <div class="col-md-3">
                                    FP&M Department
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.dept_name}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.dept_name"></div>
                            <div class="row" ng-if="item.academic_name">
                                <div class="col-md-3">
                                    Academic Department
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.academic_name}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.academic_name"></div>
                            <div class="row" ng-if="item.student_org != ''">
                                <div class="col-md-3">
                                    Student Organizations
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.student_org}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.student_org != ''"></div>
                            <div class="row" ng-if="item.research_centers != ''">
                                <div class="col-md-3">
                                    Research Centers/ Campus Divisions
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.research_centers}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.research_centers != ''"></div>
                            <div class="row" ng-if="item.num_students != ''">
                                <div class="col-md-3">
                                    Number of Student Participants
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.num_students}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.num_students != ''"></div>
                            <div class="row" ng-if="item.doc_name != ''">
                                <div class="col-md-3">
                                    Document Name (if applicable)
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.doc_name}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.doc_name != ''"></div>
                            <div class="row" ng-if="item.doc_type != ''">
                                <div class="col-md-3">
                                    Document Type
                                </div>
                                <div class="col-md-9">
                                    <p>{{item.doc_type}}</p>
                                </div>
                            </div>
                            <div class="clearfix" ng-if="item.doc_type != ''"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var host = "http://localhost";
            function facCtrl($scope, $http){
                $scope.items = {};

                $scope.FPMchoice = 0;
                $scope.academicChoice = 0;
                $scope.studentChoice = 0;

                var FPMlist = <?php echo json_encode($FPM); ?>;
                var AcademicList = <?php echo json_encode($academics); ?>;
                var StudentList = <?php echo json_encode($stud_orgs); ?>;
                
                $scope.FPM = FPMlist;
                $scope.academics = AcademicList;
                $scope.stud_orgs = StudentList;

                console.log($scope.FPM, $scope.academics, $scope.stud_orgs);

                $scope.get = function(id){
                    $http.get(host + '/index.php/get/' + id).success(function(data) { 
                        $scope.items = data;
                    });
                }

                $scope.updateLists = function(changed){
                    var f = $scope.FPMchoice ? $scope.FPMchoice.id : 0;
                    var a = $scope.academicChoice ? $scope.academicChoice.id : 0;
                    var s = $scope.studentChoice ? $scope.studentChoice.org_id : 0;

                    $.get(host + '/index.php/selects/' + f + "/" + a + "/" + s).success(function(data) { 
                        console.log(data);
                        
                    });
                }
            }
        </script>
    </body>
</html>