<?php
include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../objects/article.php';
 

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);
$title = isset($_GET['title']) ? $_GET['title'] : die();
$content = isset($_GET['content']) ? $_GET['content'] : die();
$created_ =  date('Y-m-d H:i:s');



$user = new User($db);

$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = base64_encode(isset($_GET['password']) ? $_GET['password'] : die());

$stmt = $user->login();


if($stmt->rowCount() > 0){
   
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmta = $article->InsertArticle($user->id,$title,$content,$created_);

    if($stmta->rowCount() > 0){

        $rowa = $stmt->fetch(PDO::FETCH_ASSOC);
   
        $user_arr=array(
        "status" => true,
        "message" => "Successfully posted!",
        "id" => $row['id'],
        "username" => $row['username'],
        "title" => $rowa['title'],
        "content" => $rowa['content']
        );
    }
    else{
        $user_arr=array(
            "status" => false,
            "message" => "Invalid posting",
            );
        }
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
        );
}

print_r(json_encode($user_arr));
?>