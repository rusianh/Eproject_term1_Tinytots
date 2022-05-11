<?php

class news extends dbh
{
    public $newsId;
    public $title;
    public $content;
    public $imageLink;

    public function __construct($newsId,$title,$content,$imageLink)
    {
        $this->newsId = $newsId;
        $this->title = $title;
        $this->content = $content;
        $this->imageLink = $imageLink;
    }

    public function setNews()
    {
        $sql = "call proc_news_insert(?, ?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->title,$this->content,$this->imageLink]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }

    public function getNews()
    {
        $sql = "call proc_news_selectTitle(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->title]);
        $data = $stmt->fetchAll();
        if(count($data) > 0)
        {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }

    public function editNews()
    {
        $sql = "call proc_news_update(?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->newsId,$this->title,$this->content,$this->imageLink]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }
}