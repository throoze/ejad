<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Confirmation', 'doctrine');

/**
 * BaseConfirmation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $hash
 * @property User $User
 * 
 * @method integer      getUserId()  Returns the current record's "user_id" value
 * @method string       getHash()    Returns the current record's "hash" value
 * @method User         getUser()    Returns the current record's "User" value
 * @method Confirmation setUserId()  Sets the current record's "user_id" value
 * @method Confirmation setHash()    Sets the current record's "hash" value
 * @method Confirmation setUser()    Sets the current record's "User" value
 * 
 * @package    Ejad
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConfirmation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Confirmation');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('hash', 'string', 64, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 64,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}