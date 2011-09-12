<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    Ejad
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'username'   => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'lastname'   => new sfWidgetFormInputText(),
      'gender'     => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'passwd'     => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputText(),
      'lastlogin'  => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'   => new sfValidatorString(array('max_length' => 50)),
      'name'       => new sfValidatorString(array('max_length' => 50)),
      'lastname'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'gender'     => new sfValidatorString(array('max_length' => 1)),
      'email'      => new sfValidatorString(array('max_length' => 100)),
      'passwd'     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'status'     => new sfValidatorInteger(array('required' => false)),
      'lastlogin'  => new sfValidatorDateTime(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
