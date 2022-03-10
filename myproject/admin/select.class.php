<?php
class SelectList
{
    protected $conn;

        public function __construct()
        {
            $this->DbConnect();
        }

        protected function DbConnect()
        {
            //include "db_config.php";
            $this->conn = mysql_connect('localhost','root','') OR die("Unable to connect to the database");
            mysql_select_db('etutor',$this->conn) OR die("can not select the database $db");
            return TRUE;
        }

        public function ShowDepartment()
        {
            $sql = "SELECT * FROM tbl_department";
            $res = mysql_query($sql,$this->conn);
            $category = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $category .= '<option value="' . $row['dept_id'] . '">' . $row['dept_name'] . '</option>';
            }
            return $category;
        }

        public function ShowCourse()
        {
            $sql = "SELECT * FROM tbl_course WHERE dept_id=$_POST[id]";
            $res = mysql_query($sql,$this->conn);
            $type = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['course_id'] . '">' . $row['course_title'] . '</option>';
            }
            return $type;
        }
		public function ShowStudent()
		{
			$sql = "SELECT * FROM tbl_student";
            $res = mysql_query($sql,$this->conn);
            $student = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $student .= '<option value="' . $row['student_id'] . '">' . $row['fullname'] . '</option>';
            }
            return $student;
		}
		public function ShowSubject()
        {
		    $sql = "SELECT * FROM tbl_student WHERE student_id=$_POST[id]";
            $res = mysql_query($sql,$this->conn);
			$r=mysql_fetch_array($res);
			$cid=$r['course_id'];
			//echo $cid;
			$selSub="SELECT * FROM tbl_subject WHERE course_id='$cid'";
			$result=mysql_query($selSub,$this->conn);
            $subject = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($result))
            {
                $subject .= '<option value="' . $row['subject_id'] . '">' . $row['subject_title'] . '</option>';
            }
            return $subject;
        }
		public function ShowTeacher()
        {
            $sql = "SELECT * FROM tbl_teacher_subject WHERE subject_id=$_POST[id]";
            $res = mysql_query($sql,$this->conn);
			while($r=mysql_fetch_array($res))
			{
				$tid=$r['teacher_id'];
				$selQry="SELECT * FROM tbl_teacher WHERE teacher_id='$tid'";
				$result=mysql_query($selQry,$this->conn);
            	$teacher = '<option value="0">choose...</option>';
            	while($row = mysql_fetch_array($result))
            	{
                	$teacher .= '<option value="' . $row['teacher_id'] . '">' .$row['firstname']. '</option>';
            	}
			}
            return $teacher;
        }
		public function ShowQnsCourse($did)
        {
            $sql = "SELECT * FROM tbl_course where dept_id='$did'";
            $res = mysql_query($sql,$this->conn);
            $course = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $course .= '<option value="' . $row['course_id'] . '">' . $row['course_title'] . '</option>';
            }
            return $course;
        }
		
		public function ShowQnsSubject()
        {
         $cid=$_POST[id];
		    $sql = "SELECT * FROM tbl_subject where course_id='$cid'";
			echo $_POST[id];
            $res = mysql_query($sql,$this->conn);
            $subj = '<option value="0"> choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $subj .= '<option value="' . $row['subject_id'] . '">' . $row['subject_title'] . '</option>';
            }
            return $subj;
        }
		public function ShowStudents()
		{
			$sql="SELECT DISTINCT tbl_student.* FROM tbl_student inner join tbl_class where tbl_class.student_id not in(select tbl_exam.student_id from tbl_exam)";
			$res=mysql_query($sql,$this->conn);
			$student='<option value="0" >Choose...</option>';
			while($row = mysql_fetch_array($res))
			{
				$student .= '<option value="'.$row['student_id'].'">'.$row['fullname'].'</option>';
			}
			return $student;
		}
		public function ShowStudentSubject()
        {
         	$sid=$_POST[id];
		    $sql = "SELECT * FROM tbl_student where student_id='$sid'";
			//echo $_POST[id];
            $res = mysql_query($sql,$this->conn);
			$course_row=mysql_fetch_array($res);
			$cid=$course_row['course_id'];
            $subj = '<option value="0"> choose...</option>';
			$sql_subj="select * from tbl_subject where course_id='$cid' and subject_id not in(select subject_id from tbl_exam where student_id='$sid')";
			$course=mysql_query($sql_subj);
			while($row = mysql_fetch_array($course))
			{
				$subj .= '<option value="'.$row['subject_id'].'">'.$row['subject_title'].'</option>';
			}
            
            return $subj;
        }
		

}
$opt = new SelectList();
?>