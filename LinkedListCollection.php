<?php
    class Node{
        public $data;
        public $next;

        public function __construct(){
            $this->data = 0;
            $this->next = null;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function getData(){
            return $this->data;
        }

        public function setNext($next){
            $this->next = $next;
        }

        public function getNext(){
            return $this->next;
        }
    }
    class LinkedList{
        private $head;
        private $count;
        private $lastNode;
        public function __construct(){
            $this->head = null;
            $this->count = 0;
            $this->lastNode = null;
        }
        public function insertAtBack($data){
            $newNode = new Node();
            $newNode->setData($data);
        
            if ($this->head){
                $currentNode = $this->head;
                while ($currentNode->getNext() != null){
                    $currentNode = $currentNode->getNext();
                }
                $currentNode->setNext($newNode);
            }
            else{
                $this->head = $newNode;
            }
        }

        public function insertAtFront($data):void{
            if ($this->head){
                $newNode = new Node();
                $newNode->setData($data);
                $newNode->setNext($this->head);
                $this->head = $newNode;
            }
            else{
                $newNode = new Node();
                $newNode->setData($data);
                $newNode->head = $newNode;          
            }
        }

        public function deleteNode($key){
            $previousNode = new Node();
            $currentNode = $this->head;
            $previousNode = $this->head;
            while($currentNode->getdata() != $key){
                if($currentNode->getNext() == null){
                    return null;
                }
                else{
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->getNext();
                }
            }
            if($currentNode == $this->head)
            {
                if($this->count == 1){
                    $this->lastNode = $this->head;
                }
                $this->head = $this->head->getNext();
            }
            else{
                if($this->lastNode == $currentNode){
                    $this->lastNode = $previousNode;
                }
                $previousNode->next = $currentNode->next;
            }
            $this->count--;
        }

        public function find($key){
            $currentNode = $this->head;
            while($currentNode->getdata() != $key){
                if($currentNode->getNext() == NULL){
                    return null;
                }
                else{
                    $currentNode = $currentNode->getNext();
                }
            }
            return $currentNode;
        }

        public function display(){
            $listData = array();
            $currentNode = $this->head;
            while($currentNode != null)
            {
                array_push($listData, $currentNode->getData());
                $currentNode =$currentNode->getNext();
            }
            foreach($listData as $v){
                echo $v." ";
            }
        }
    }
    $obj = new LinkedList();
    $obj->insertAtBack(18);
    $obj->insertAtBack(8);
    $obj->insertAtBack(9);
    $obj->insertAtBack(58);
    $obj->insertAtBack(2);
    
    //$obj->insertAtFront(20);
    //$obj->insertAfterSpecficNode(2, 2);
  //$obj->insertBeforeSpecficNode(1, 1);
    $obj->display();
    if($obj->find(58)){
        echo "<br>Yes the item is present";
    }
    else{
        echo "<br>No the item is not present";
    }
    
    $obj->deleteNode(18);
    echo "<br>After deleting the node : ";
    $obj->display();

?>