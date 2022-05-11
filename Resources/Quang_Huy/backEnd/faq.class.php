<?php

class faq extends dbh
{
    public $faqId;
    public $subject;
    public $question;
    public $answer;

    public function __construct($faqId,$subject,$question,$answer)
    {
        $this->faqID = $faqId;
        $this->subject = $subject;
        $this->question = $question;
        $this->answer = $answer;
    }

    public function setFaq()
    {
        $sql = "call proc_faq_insert(?, ?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->subject,$this->question,$this->answer]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }

    public function getFaq()
    {
        $sql = "call proc_faq_selectSubject(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->subject]);
        $data = $stmt->fetchAll();
        if(count($data) > 0)
        {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }

    public function editFaq()
    {
        $sql = "call proc_faq_update(?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->faqId,$this->subject,$this->question,$this->answer]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }
}