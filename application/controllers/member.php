<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('member/member_m');
        $this->load->helper(array('url','date'));
    }

    public function _remap($method)
    {
        // 헤더 include
        $this->load->view('header_v');

        if ( method_exists($this, $method))
        {
            $this->{"{$method}"}();
        }

        // 푸터 include
        $this->load->view('footer_v');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        /*
         * 로그인 인증 절차
         *  1. 폼 데이터가 전송되면 폼 검증을 이용해서 이메일 양식이 맞는지 검사.
         *  2. 아이디가 있는지 검사와 비밀번호가 일치하는지 검사한다.
         *  3. 세션을 할당해 준다.
         *  4. 리아디렉션으로 홈으로 보내준다.
         */

        /* 폼 검증 라이브러리 로드 */
        $this->load->library('form_validation');

        if($_POST)
        {

            /* 폼 검증 라이브러리 활용함 */
            /* required : 공백 */
            $this->form_validation->set_rules('email','이메일','valid_email|required');
            $this->form_validation->set_rules('password','비밀번호','required');

            if($this->form_validation->run() == TRUE)
            {
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);

                $query_element = array(
                    'email' => $email,
                    'passwd' => hash('sha256',$password)
                );

                $result = $this->member_m->login($query_element);

                if($result) {

                    // 세션 생성
                    $newdata = array(
                        'name' => $result->name,
                        'email' => $result->id,
                        'school' => $result->school,
                        'class' => $result->class,
                        'grade' => $result->grade,
                        'autho' => $result->authority,
                        'age' => $result->age,
                        'logged_in' => TRUE
                    );

                    // 세션 등록
                    $this->session->set_userdata($newdata);
                    // 홈 뷰로 이동.
                    echo "<script> window.location.replace(\"/member/main/home\"); </script>";
                }else{ // 아이디 또는 비밀번호가 불일치일 경우 로그인 뷰로 이동.
                    echo "<script> alert(\"아이디 또는 비밀번호가 불일치 합니다.\"); </script>";
                    $this->load->view('member/login_v');
                }

            }else{
                // 양식에 안맞으므로 다시 적게함.
                echo "<script> alert(\"입력안했거나 양식에 안맞습니다.\"); </script>";
                $this->load->view('member/login_v');
            }

        }else{
            $this->load->view('member/login_v');
        }
    }

    public function join()
    {
        $this->load->library('form_validation');

        if ($_POST) {

            /* 폼 검증 라이브러리 활용함 */
            /* required : 공백 */
            $this->form_validation->set_rules('email','이메일','valid_email|required|callback_username_check');
            $this->form_validation->set_rules('pw','비밀번호','required');
            $this->form_validation->set_rules('name','이름','required|min_length[2]');
            $this->form_validation->set_rules('authority','권위','required');
            $this->form_validation->set_rules('age','나이','required|alpha_numeric');
            $this->form_validation->set_rules('grade','번호','required|alpha_numeric');
            $this->form_validation->set_rules('class','반','required|alpha_numeric');
            $this->form_validation->set_rules('school','학교','required');

            if($this->form_validation->run() == TRUE)
            {
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('pw', TRUE);
                $name = $this->input->post('name',TRUE);
                $authority = $this->input->post('authority',TRUE);
                $age = $this->input->post('age',TRUE);
                $grade = $this->input->post('grade',TRUE);
                $class = $this->input->post('class',TRUE);
                $school = $this->input->post('school',TRUE);

                $query_element = array(
                    'email' => $email,
                    'passwd' => hash('sha256',$password),
                    'name' => $name,
                    'authority' => $authority,
                    'age' => $age,
                    'grade' => $grade,
                    'class' => $class,
                    'school' => $school
                );

                $this->member_m->register($query_element);
                $this->load->view('member/login_v');
            }else{
                $this->load->view('member/join_v');
            }

        } else { // 안되었을 때
            $this->load->view('member/join_v');
        }
    }

    public function username_check($email)
    {

        $this->load->database();

        if ($email)
        {
            $sql = "SELECT id FROM `member` WHERE id='".$email."'";
            $query = $this->db->query($sql);
            $result = @$query->row();

            if( $result )
            {
                $this->form_validation->set_message('중복된 아이디입니다.');
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            return FALSE;
        }
    }

}

?>