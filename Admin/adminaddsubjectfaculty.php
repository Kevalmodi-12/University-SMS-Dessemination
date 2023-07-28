<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add Subject Faculty</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="https:/cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js"></script>
    <style>
        .header{
            height: 100px;
            width: 100%;
            background-color: chocolate;
            position: fixed;
            float: left;
        }
        .section{
            float: left;
            margin-top: 100px;
            width: 100%;
            height: 100%;
        }
        .sidenav {
            height: 100%;
            float: left;
            width: 0px;
            position: fixed;
            z-index: 1;
            top: 100px;
            left: 0;
            background-color: gray;
            overflow-x: hidden;
            padding-top: 20px;
            transition:all 0.3s ease-out;
        }
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 24px;
            color: black;
            display: block;
        }
        .sidenav a:hover {
            color: white;
        }
        .sidenav .active {
            color: white;
        }
        .main {
            font-size: 28px; /* Increased text to enable scrolling */
            padding: 0px 10px;
            height: 100%;
            width: 100%;
            margin-left: 0px;
            padding-left: 0px;
        }
        .submain{
            width: 100%;
        }
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        .counter {
            animation-duration: 1s;
            animation-delay: 0s;
        }
        .btnadd{
            background-color: chocolate;
            border-color: chocolate;
            color: white;
        }
        .btnadd:hover{
            background-color: chocolate;
            border-color: chocolate;
            color: white;
        }
        .addcourseform{
            font-size: 18px;
        }

    </style>
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['auname'])){
            header("location: adminlogin.html");
        } 
    ?>
    <header>
        <div class="container-fluid header">
            <nav class="navbar navbar-expand-sm">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <a  class="toggle" id="toggle" style="font-size: 30px; color: white; margin-left: 15px;"><i class="fa fa-bars"></i></a>
                        <img src="../Images/L22.png" class="navbar-brand" style="height: 80px; margin-left: 50px;">
                    </div>
                    <div class="d-flex" style="margin-right: 10px;">
                        <button class="btn bg-white" type="button" onclick="onlogout()">Log Out</button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section class="section">
        <div class="sidenav" id="sidebar">
            <a href="adminhome.php">Dashboard</a>
            <a href="adminaddcourse.php">Add Course</a>
            <a href="adminaddbranch.php">Add Branch</a>
            <a href="adminaddsubject.php">Add Subject</a>
            <a href="adminaddexam.php">Add Exam</a>
            <a href="adminaddsubjectfaculty.php" class="active">Add Subject Faculty</a>
            <a href="adminsendresult.php">Send Result</a>
            <!-- <a href="#">Course List</a>
            <a href="#">Branch List</a>
            <a href="#">Subject List</a>
            <a href="#">Exam List</a> -->
            <!-- <a href="adminfacultylist.php">Faculty List</a>
            <a href="#">Student List</a> -->
        </div>
        <div class="main" id="sidemain">
        <?php 
                if(isset($_COOKIE['alert5'])){
                    echo $_COOKIE['alert5'];
                    // unset($_COOKIE['alert5']);
                }
        ?>
            <div class="container-fluid submain">
                <div class="container-fluid" style=" border:1px solid chocolate; width: 40%; margin-top: 50px; padding: 0px; margin-left: 0px auto;">
                <p style="color: white; background-color: chocolate; font-weight: bold; text-align: center; font-size: 24px;">ADD SUBJECT FACULTY</p>
                <div class="container addcourseform">
                <form method="post" action="onaddsubjectfaculty.php">
                <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="coursename" name="coursename" onchange="oncoursechange(this.value)">
                            <option value="">Select Course</option>
                            <?php
                                $conn=mysqli_connect("localhost","root","","university");
                                $sql1="select * from course_table";
                                $result1=mysqli_query($conn,$sql1);
                                while($row = mysqli_fetch_assoc($result1)) {
                            ?>
                            <option><?php echo $row["coursename"]; ?></option>
                            <?php
                                }
                                mysqli_close($conn);
                            ?>
                            </select>
                                <label for="coursename" class="form-label">Course:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="branchname" name="branchname">
                                <option value="">Select Branch</option>
                            </select>
                            <label for="branchname" class="form-label">Branch:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="semester" name="semester" onchange="onsemesterchange(this.value)">
                                <option value="">Select Semester</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            <label for="semester" class="form-label">Semester:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="subjectname" name="subjectname" onchange="onsubjectchange()">
                                <option value="">Select Subject</option>
                            </select>
                            <label for="subjectname" class="form-label">Subject:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="facultyname" name="facultyname">
                                <option value="">Select Faculty</option>
                            </select>
                            <label for="facultyname" class="form-label">Faculty:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="container text-center mb-2 mt-2">
                                <input type="submit" class="btn btnadd" name="btnsubmit" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </section> 
    <script>
        var btn = document.getElementById('toggle');
        var btnst = true;
        btn.onclick = function() {
        if(btnst == true) {
            document.getElementById('sidebar').style.width = '200px';
            document.getElementById('sidemain').style.paddingLeft = '200px';
            btnst = false;
        }else if(btnst == false) {
            document.getElementById('sidebar').style.width = '0px';
            document.getElementById('sidemain').style.paddingLeft = '0px';
            btnst = true;
        }
        }
        function onlogout() {
            window.location.assign("adminlogout.php");
        }
        $('.counter').counterUp({
            delay: 10,
            time: 500
        });
         
        function oncoursechange(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("branchname").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","adminselectbranch.php?course="+str,true);
            xmlhttp.send();
        }
        function onsemesterchange(str) {
            course =document.getElementById('coursename').value;
            branch = document.getElementById('branchname').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subjectname").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","adminselectsubject.php?course="+course+"&branch="+branch+"&sem="+str,true);
            xmlhttp.send();
        }
        function onsubjectchange() {
            course =document.getElementById('coursename').value;
            branch = document.getElementById('branchname').value;
            sem = document.getElementById('semester').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("facultyname").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","adminselectfaculty.php?course="+course+"&branch="+branch+"&sem="+sem,true);
            xmlhttp.send();
        }

    </script>
</body>
</html>