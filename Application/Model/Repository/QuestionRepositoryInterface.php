<?php

namespace Application\Model\Repository;

use \Application\Model\Entity\QuestionStandard;
use \Application\Model\Entity\QuestionMultipleChoice;

interface QuestionRepositoryInterface {

    public function insert($table, $question);
    
}
