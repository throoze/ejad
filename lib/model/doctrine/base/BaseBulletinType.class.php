<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BulletinType', 'doctrine');

/**
 * BaseBulletinType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $Subscription
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getName()         Returns the current record's "name" value
 * @method Doctrine_Collection getSubscription() Returns the current record's "Subscription" collection
 * @method BulletinType        setId()           Sets the current record's "id" value
 * @method BulletinType        setName()         Sets the current record's "name" value
 * @method BulletinType        setSubscription() Sets the current record's "Subscription" collection
 * 
 * @package    Ejad
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBulletinType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('BulletinType');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Subscription', array(
             'local' => 'id',
             'foreign' => 'bulletin_type_id'));
    }
}