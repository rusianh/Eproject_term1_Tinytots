<?php




class attribute extends dbh
{

    public function setAttribute($attributeId, $attributeName)
    {
        $sql = "call proc_attribute_insert(?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$attributeId, $attributeName]);
        $conn = null;
    }
      public function deleteAttribute($attributeId)
    {
        $sql = "call proc_attibute_delete(?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$attributeId]);
        $conn = null;
    }
    public function editAttribute($attributeId, $attributeName)
    {
        $sql = "call proc_attribute_update( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);;
        $stmt->execute([$attributeId, $attributeName]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }

    public function getAttributeId($attributeId)
    {
        $sql = "call proc_attribute_selectID( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$attributeId]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;

    }

}
