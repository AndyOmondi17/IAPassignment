<?php
include_once './db.php';
include_once './account.php';
class User implements Account{
    private $Firstname,$Surname,$Username,$Email,$City,$UploadFile,$Password;
    
    public function __construct(){
    }

    
    // getters and setters
    public function setFirstName($fn){
        $this->Firstname=$fn;
    }
    public function getFirstName(){
        return $this->Firstname;
    }


    public function setSurName($sn){
        $this->Surname=$sn;
    }
    public function getSurName(){
        return $this->Surname;
    }


    public function setUserName($un){
        $this->Username=$un;
    }
    public function getUserName(){
        return $this->Username;
    }


    public function setEmail($em){
        $this->Email=$em;
    }
    public function getEmail(){
        return $this->Email;
    }


    public function setCity($ct){
        $this->City=$ct;
    }
    public function getCity(){
        return $this->City;
    }


    public function setUploadFile($up){
        $this->UploadFile=$up;
    }
    public function getUploadFile(){
        return $this->UploadFile;
    }


    public function setPassword($pa){
        $this->Password=$pa;
    }
    public function getPassword(){
        return $this->Password;
    }
    
    public function register($pdo){
        // register a user
        $hashedPassword = password_hash($this->getPassword(),PASSWORD_DEFAULT);
        try{
            $stm = $pdo-> prepare("INSERT Into usersave (Firstname, Surname, Username, Email, City, UploadFile, Password) values (?,?,?,?,?,?,?)");
            $stm->execute([$this->getFirstName(),$this->getSurName(),$this->getUserName(),$this->getEmail(),$this->getCity(),$this->getUploadFile(),$hashedPassword]);
            $stm=null;
            echo "Registration was succesful";
        }catch(PDOException $ex){
            return $ex->getMessage();
        }
    }
    public function login($pdo){
        $_SESSION['user'] = '';
        $user_login = !empty($_POST['Username']) ? ($_POST['Username']):null;
        $passwordAttempt = !empty($_POST['Password']) ? ($_POST['Password']):null;
        
        
        //Allow user to login
        // $hashedPassword = password_hash($this->getPassword(), PASSWORD_DEFAULT);
        $hashedPassword = password_hash($this->getPassword(),PASSWORD_DEFAULT);
        $validpassword = password_verify($this->getPassword(),$hashedPassword);
        try{
            $stm = $pdo-> prepare("select Username,Password from usersave where Username= :Username");
            $stm->bindValue(':Username',$user_login);
            $stm-> execute();
                if($validpassword){
                    $_SESSION['user'] = $user_login;
                    echo '<script>window.location.replace("welcome.php")</script>';
                }else{
                    echo '<script>alert("invalid username or password")</script>';
                }
             
        }catch(PDOException $ex){
            return $ex->getMessage();
        }     
    }

    public function changePassword($pdo){
        $user = '';
        $_SESSION['Username']=$user_login = !empty($_POST['Username']) ? ($_POST['Username']):null;
        
        if($user){
            $Username = $_POST['Username'];
            $newpassword = $_POST['Newpassword'];
            $Confirmnewpassword = $_POST['Confirmnewpassword'];
            
            $hashedPassword1 = password_hash($newpassword,PASSWORD_DEFAULT);
            $hashedPassword2 = password_hash($Confirmnewpassword,PASSWORD_DEFAULT);
            try{
                $stm = $pdo-> prepare("select Password from usersave where Username= '$user'");
                $stm->bindValue(':Username',$user);
                $stm-> execute();
                    if($hashedPassword1 == $hashedPassword2){
                     $querychange = mysql_query(" UPDATE usersave SET Password='$hashedPassword1' WHERE Username='$user'");
                     $stm = $pdo->prepare($querychange);
                     $stm->execute();
                    }         
            }catch(PDOException $ex){
                return $ex->getMessage();
            }     
        }
    }
    public function logout($pdo){

    }
}
?>