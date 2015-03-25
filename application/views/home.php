<!DOCTYPE html>
<html> 
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/bootstrap-lightbox.min.css'); ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/css/main.css'); ?>">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
        <script src="<?php echo $this->config->base_url('assets/js/jquery-1.3.2.js'); ?>"></script>
        <script src="<?php echo $this->config->base_url('assets/js/ui.core.js'); ?>"></script>
        <script src="<?php echo $this->config->base_url('assets/js/ui.carousel.js'); ?>"></script>
    </head>

     <!--<input type="text" ng-model="id" />
                        <a href="#" ng-click="get(id)">GET</a> -->
    <body>
        <div id="container" ng-app ng-controller="facCtrl">
            <h1 style="margin-left:50px; margin-bottom: 35px; font-size:4.0em">UW Facilities</h1>   
            <div class="divider" style="border-bottom: solid 1px;"></div>   
                <div class="col-md-4"><h2>FP&amp;M Department</h2></div>
                <div class="col-md-4"><h2>Academic Department</h2></div>
                <div class="col-md-4"><h2>Student Organization</h2></div>
            <div class="clearfix"></div>
            <div class="divider" style="border-bottom: solid 1px;"></div>
            
                <div class="demo">
                    <ul id="carousel" class ="carousel col-md-4">
                        <li ng-repeat="type in FPM" class="listEle0{{$index}}" ng-click="setFPMchoice(type)">{{type.dept_name}}</li>
                    </ul>
                </div>
                <div class="demo">
                    <ul id="carousel1" class ="carousel col-md-4">
                        <li ng-repeat="type in academics" class="listEle1{{$index}}" ng-click="setACADEMICSchoice(type)">{{type.academic_name}}</li>
                    </ul>
                </div>
                <div class="demo">
                    <ul id="carousel2" class ="carousel col-md-4">
                        <li ng-repeat="type in stud_orgs" class="listEle2{{$index}}" ng-click="setORGchoice(type)">{{type.student}}</li>                    
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="divider" style="border-top: solid 1px;"></div>
                    <h4 ng-show="!(editFPM && editAcademics && editStudent)"> Projects remaining: {{ids.length}}</h4>
                    <div style="padding-left:0px; width:265px; margin-top: 15px;" >
                        <div class="col-xs-3">
                            <a class="btn btn-success" ng-click="getAll()">Get All Projects</a>
                        </div>
                        <div class="col-xs-5 col-xs-offset-3">
                            <a class="btn btn-primary" ng-click="reset()">Reset</a>
                        </div>
                    </div>
                <div class="col-md-6">
                    <div ng-show="items.length" class="col-md-12 results">
                        <div class="items">
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
                                <div class="row" ng-if="item.org_name">
                                    <div class="col-md-3">
                                        Student Organizations
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{item.org_name}}</p>
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
            var FPMlist = <?php echo json_encode($FPM); ?>;
            var AcademicList = <?php echo json_encode($academics); ?>;
            var StudentList = <?php echo json_encode($stud_orgs); ?>;
            var FPMlistInd = makeIndexedArr(FPMlist,"FPM"); //returns an array of size
            var AcademicListInd = makeIndexedArr(AcademicList,"Academics");
            var StudentListInd = makeIndexedArr(StudentList,"Student");

            var arrs;

            Array.prototype.clean = function(deleteValue) {
              for (var i = 0; i < this.length; i++) {
                if (this[i] == deleteValue) {         
                  this.splice(i, 1);
                  i--;
                }
              }
              return this;
            };

            function makeIndexedArr(array,mode){
                var ret = [];
                var i = 0;

                switch(mode){
                    case "FPM":
                        for(i; i < array.length; i++){
                          ret[array[i].id] = i;
                        }
                        break;
                    case "Academics":
                        for(i; i < array.length; i++){
                          ret[array[i].id] = i;
                        }
                        break;
                    case "Student":
                        for(i; i < array.length; i++){
                          ret[array[i].org_id] = i;
                        }
                        break;
                    }
                return ret;
              };


            function facCtrl($scope, $http){
                $scope.items = [];
                $scope.ids = [];

                $scope.FPMchoice = 0;
                $scope.academicChoice = 0;
                $scope.studentChoice = 0;

                $scope.editFPM = true;
                $scope.editAcademics = true;
                $scope.editStudent = true;

                $scope.FPM = FPMlist;
                $scope.academics = AcademicList;
                $scope.stud_orgs = StudentList;

                $scope.setFPMchoice = function(type){
                    $scope.FPMchoice = type;
                    $scope.updateLists('FPM');
                };
                $scope.setACADEMICSchoice = function(type){
                    $scope.FPMchoice = type;
                    $scope.updateLists('academic');
                    console.log(type);
                };
                $scope.setORGchoice = function(type){
                    $scope.FPMchoice = type;
                    $scope.updateLists('student');
                    console.log(type);
                };

                $scope.get = function(ind){
                    $http.get('/get/' + $scope.ids[ind])
                        .success(function(data) { 
                            $scope.items[ind] = data[0];
                        });
                }

                $scope.getAll = function(){
                   $scope.items = [];
                   console.log($scope.ids);
                   for(var i = 0; i < $scope.ids.length; i++){
                       $scope.get(i); 
                    }
                    /*console.log(JSON.stringify({ ids: $scope.ids }));
                    $http({
                        method: 'POST',
                        url: host + '/getAll/',         
                        data: JSON.stringify({ ids: $scope.ids }),
                    })
                    .success(function(data){
                        console.log(data);
                    });*/
                }

                $scope.reset = function(){
                    $scope.items = [];
                    $scope.ids = [];

                    $scope.FPMchoice = 0;
                    $scope.academicChoice = 0;
                    $scope.studentChoice = 0;

                    $scope.editFPM = true;
                    $scope.editAcademics = true;
                    $scope.editStudent = true;

                    $scope.FPM = FPMlist;
                    $scope.academics = AcademicList;
                    $scope.stud_orgs = StudentList;
                }

                $scope.updateLists = function(changed){
                    //changed = 'FPM', 'academic', 'student'
                    switch(changed){
                        case "FPM":
                            $scope.editFPM = false;
                            console.log('fdsasfsdfafsf');
                            break;
                        case "academic":
                            $scope.editAcademics = false;
                            break;
                        case "student":
                            $scope.editStudent = false;
                            break;
                    }
                    var f = $scope.FPMchoice ? $scope.FPMchoice.id : 0;
                    var a = $scope.academicChoice ? $scope.academicChoice.id : 0;
                    var s = $scope.studentChoice ? $scope.studentChoice.org_id : 0;

                    console.log(host + '/selects/' + f + "/" + a + "/" + s);

                    $.ajax({
                        async: false,//apparently this is depreciated so may have to change. need it for now
                        type: 'GET',
                        url: '/selects/' + f + "/" + a + "/" + s,
                        success: function(data) { 
                            data = JSON.parse(data);

                            $scope.FPM = [];
                            $scope.academics = [];
                            $scope.stud_orgs = [];
                            $scope.ids = [];

                            for(var j = 0; j < data.length; j++){
                                if($scope.editFPM)
                                    $scope.FPM[data[j].dept_id] = FPMlist[FPMlistInd[data[j].dept_id]];
                                if($scope.editAcademics)
                                    $scope.academics[data[j].academic_dept_id] = AcademicList[AcademicListInd[data[j].academic_dept_id]];
                                if($scope.editStudent)
                                    $scope.stud_orgs[data[j].stud_org_id] = StudentList[StudentListInd[data[j].stud_org_id]];
                                $scope.ids[j] = data[j].id;
                            }   
                            
                            $scope.FPM.clean(undefined);
                            $scope.academics.clean(undefined);
                            $scope.stud_orgs.clean(undefined);
                        }
                    });
                }
            }

            $(document).ready(function()
            {
                window.setTimeout(function() {
                    $("#carousel").carousel({
                        orientation: 'vertical',
                        radius: 200
                    });
                });
                //You don't need this timeout in your pages - Safari has stupid issues with our demo system
                window.setTimeout(function() {
                    $("#carousel1").carousel({
                        orientation: 'vertical',
                        radius: 250
                    });
                });
                //You don't need this timeout in your pages - Safari has stupid issues with our demo system
                window.setTimeout(function() {
                    $("#carousel2").carousel({
                        orientation: 'vertical',
                        radius: 250
                    });
                });
            
                for (var i = 0; i < 20; i++)
                {
                    var myElement = ".listEle0" + i;  
                    fade(myElement, true);
                }
                for (var i = 0; i < 20; i++)
                {
                    var myElement = ".listEle1" + i;  
                    fade(myElement, true);
                }
                for (var i = 0; i < 20; i++)
                {
                    var myElement = ".listEle2" + i;  
                    fade(myElement, true);
                }
            
                function fade (currObject, myBoolean)
                {
                    window.setInterval(function(){
                        var n = $(currObject).css("z-index"); 
                        if (n < 10 && myBoolean == false )
                        {
                            myBoolean = true;
                            $(currObject).fadeIn(100);
                        }
                        else if (n > 10 && myBoolean == true)
                        {
                            myBoolean = false;
                            $(currObject).fadeOut(500);
                        }
                    }, 20);
                }
                $("li").click(function(){
                    var text = $("." + $(this).attr("class")).text();
                    var carouselNumber = $(this).attr("class");
                    carouselNumber = carouselNumber.charAt(carouselNumber.length - 2)
                    if (carouselNumber == 0)
                    {
                        $(".currEl1").html("The current element is: " + text);
                    }
                });
                $("li").click(function(){
                    var text = $("." + $(this).attr("class")).text();
                    var carouselNumber = $(this).attr("class");
                    carouselNumber = carouselNumber.charAt(carouselNumber.length - 2);
                    if (carouselNumber == 1)
                    {
                        $(".currEl2").html("The current element is: " + text);
                    }
                });
                $("li").click(function(){
                    var text = $("." + $(this).attr("class")).text();
                    var carouselNumber = $(this).attr("class");
                    carouselNumber = carouselNumber.charAt(carouselNumber.length - 2);
                    if (carouselNumber == 2)
                    {
                        $(".currEl3").html("The current element is: " + text);
                    }
                });
            });
        </script>
    </body>
</html>