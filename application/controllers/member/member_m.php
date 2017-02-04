<?php if(!defined('BASEPATH')) exit('No direct access allowed');

class Member_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login($query)
    {
        $email = "\"".$query['email']."\"";
        $passwd = "\"".$query['passwd']."\"";

        $sql = "SELECT * FROM `member` WHERE id = $email AND password = $passwd";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function register($query)
    {
        $email = "\"".$query['email']."\"";
        $passwd = "\"".$query['passwd']."\"";
        $name = "\"".$query['name']."\"";
        $authority = "\"".$query['authority']."\"";
        $age = "\"".$query['age']."\"";
        $grade = "\"".$query['grade']."\"";
        $class = "\"".$query['class']."\"";
        $school = "\"".$query['school']."\"";

        $sql = "INSERT INTO `member`(`id`, `password`, `name`, `authority`,`age`,`grade`,`class`,`school`) VALUES ($email,$passwd,$name,$authority,$age,$grade,$class,$school)";

        $this->db->query($sql);
    }



}

?>