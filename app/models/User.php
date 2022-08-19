<?php
class User extends Controller
{
    private $error = "";

    /**
     * register
     * Check FormData from the register form and insert the user into the database if no error exists
     * @return void
     */

    public function register()
    {
        $context = ApplicationDbContext::getInstance();
        $data = array();
        $data['fullName'] = validateData($_POST['fullName']);
        $data['email'] = validateData($_POST['email']);
        $data['password'] = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $data['username'] = null;


        $data['image'] = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $tmp_dir = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];

        //$data['image'] = $userImage;

        if ($data['image'])
        {
            $upload_dir = 'assets/images/userImage/';
            $imgExt = strtolower(pathinfo($data['image'], PATHINFO_EXTENSION));
            $validExt = array('jpeg', 'jpg', 'png', 'gif');
            $data['image'] = rand(1000, 1000000) . "_" . $data['image'];
            
        }


        // verify data
        if (empty($data['fullName']) || !preg_match("/^[a-zA-Z-' ]*$/", $data['fullName']))
        {
            $this->error .= "Enter a Valid Full Name Character <br/>";
        }

        if (empty($data['email']) || (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)))
        {
            $this->error .= "Enter a Valid Email <br/>";
        }

        if ($data['password'] !== $confirmPassword)
        {
            $this->error .= "Password does not match <br/>";
        }

        if (empty($data['password']) || empty($confirmPassword))
        {
            $this->error .= "Password Fields cannot be empty <br/>";
        }

        if (strlen($data['password']) < 5)
        {
            $this->error .= "Password must be at least 5 Characters <br/>";
        }

        $verifyEmail = $this->verifyEmail($data);

        $genUsername = explode("@", $verifyEmail);

        $data['username'] = $genUsername[0];


        if (is_array($verifyEmail))
        {
            $this->error .= "This Email Already Exists, Try Another Email.. <br/>";
        }

        if (empty($data['image']))
        {
            $this->error .= "Please Choose a Profile Image.. <br/>";
        }


        if ($this->error == "")
        {

            $data['password'] = hash('sha1', $data['password']);

            move_uploaded_file($tmp_dir, $upload_dir.$data['image']);



            $query = ("INSERT INTO users (fullName, email, username, password, image) VALUES (:fullName, :email, :username, :password, :image)");
            $res = $context->write($query, $data);
            
            if ($res)
            {
                header("Location: " . "User/login");
                die();
            }
        }
        $_SESSION['error'] = $this->error;
    }

    /**
     * login
     * check the data from the login form and login the user if there are corrects
     * @return void
     */
    public function login()
    {
        $context = ApplicationDbContext::getInstance();
        $data = array();
        $data['email'] = validateData($_POST['email']);
        $data['password'] = validateData($_POST['password']);

        

        if (empty($data['email']))
        {
            $this->error .= "Email Field Cannot be Empty!!! <br/>";
        }
        if (empty($data['password']))
        {
            $this->error .= "Password Field Cannot be Empty!!!<br/>";
        }
        if ($this->error == "")
        {
            $data['password'] = hash('sha1', $data['password']);
            $sql = "SELECT * FROM users WHERE email = :email && password = :password limit 1";
            $res = $context->read($sql, $data);

            if (is_array($res))
            {
                $_SESSION['id'] = $res[0]->id;
                header("Location: " . "/");
                die();
            }
            $this->error .= "Email or Password is Incorrect. Try again Later...";
        }
        $_SESSION['error'] = $this->error;
    }

    private function verifyEmail($data)
    {

        $context = ApplicationDbContext::getInstance();
        $query = "SELECT * FROM users WHERE email = :email limit 1";
        $arr['email'] = $data['email'];
        return $context->read($query, $arr);
    }

    /**
     * generateRandomString for image name
     * return a random string
     * @param int $length
     * @return string
     */
    // private function getRandomString($length)
    // {
    //     $array = range('0', '9');
    //     $text = "";
    //     $length = rand(4, $length);

    //     for ($i = 0; $i < $length; $i++) {
    //         $random = rand(0, count($array) - 1);
    //         $text .= $array[$random];
    //     }
    //     return $text;
    // }

    /**
     * isAuthenticated
     * check if the user is log in and if he is admin (to access admin part)
     * @return object
     */public function isAuthenticated($authorized = array())
     {
        $context = ApplicationDbContext::getInstance();

        if (count($authorized) > 0)
        {
            $arr['id'] = $_SESSION['id'];
            $query = "SELECT * FROM users WHERE id = :id limit 1 ";

            $res = $context->read($query, $arr);

            if (is_array($res))
            {
                $res = $res[0];

                if ($res->isAdmin && $authorized[0] === 'Admin')
                {
                    return $res;
                }
                elseif ($authorized[1] === "Clients")
                {
                    return $res;
                }
                else
                {
                    header("Location: " . "Users/login");
                    die();
                }
            }
            else
            {
                header("Location: " . "Users/login");
            }
        }
        else
        {
            if (isset($_SESSION['id']))
            {
                $arr['id'] = $_SESSION['id'];
                $query = " SELECT * FROM users WHERE id = :id limit 1";
                $res = $context->read($query, $arr);
                if (is_array($res))
                {
                    return $res[0];
                }
            }
        }
        return false;
     }
    /**
     * logout function
     * logout user and return home view
     * @return void
     */
    public function logout()
    {
        if (isset($_SESSION['id']))
        {
            unset($_SESSION['id']);
        }
        header("Location: " . ROOT . "Home");
    }

    /**
     * get User Fullname
     *
     * @param  array $data
     * @return array
     */
    private function generateRandomUsername($fullname, $rand_no = 200)
    {

    }

    private function checkUsername($data)
    {


    }
}
