<?php


class Posts extends Controller
{


  /**
   * Posts constructor.
   */
  public function __construct()
  {
    $this->postModel = $this->model('Post');
  }
  public function index(){
    $posts = $this->postModel->getPosts();
    $data = array(
      'posts' => $posts
    );
    $this->view('posts/index', $data);
  }
  public function show($id){
    $post = $this->postModel->getPostById($id);
    $data = array(
      'post' => $post
    );
    $this->view('posts/show', $data);
  }

  public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $post = $this->postModel->getPostById($id);
      if($post->user_id != $_SESSION['user_id']){
        redirect('posts');
      }
      if($this->postModel->deletePost($id)){
        message('post_message', 'Post Removed');
        redirect('posts');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('posts');
    }
  }
}