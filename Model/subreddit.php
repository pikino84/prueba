<?php
class subreddit{
    private $pdo;

    public $id_blog;
    public $title;
    public $author_fullname;
    public $thumbnail;
    public $selftext;

    public function __CONSTRUCT(){
        try{
            $this->pdo = Conexion::StartUp();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Listar(){
        try{
            $result = array();
            $sql = $this->pdo->prepare("SELECT * FROM subreddit ORDER BY create_date DESC");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($idblog){
        try{
            $sql = $this->pdo->prepare("DELETE FROM subreddit WHERE id_blog = ?");
            $sql->execute(array($idblog));
        }catch( Exption $e){
            die($e->getMessage());
        }
    }

    public function Registrar(){
        try{
            $sql = "INSERT INTO `subreddit`( title, author_fullname, thumbnail, selftext, create_date) VALUES ( ?, ?, ? ,?, ?)";
            //consumo de API
            $ch = curl_init();      
            curl_setopt($ch, CURLOPT_URL, "https://www.reddit.com/r/subreddit/new.json?sort=new");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //DESABILITA LA VERIFICACION SSL PARA TRABAJAR EN LOCAL HOST
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($response);
            foreach($json->data->children as $k => $v){
                $this->pdo->prepare($sql)->execute(
                    array(
                        $v->data->title,
                        $v->data->author_fullname,
                        $v->data->thumbnail,
                        $v->data->selftext,
                        date('Y-m-d',$v->data->created)
                    )
                );
            }

        }catch( Exception $e){
            die($e->getMessage());
        }
    }
}
