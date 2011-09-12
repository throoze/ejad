<?php

/**
 * Confirmation filter form base class.
 *
 * @package    Ejad
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConfirmationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'hash'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'hash'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('confirmation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Confirmation';
  }

  public function getFields()
  {
    return array(
      'user_id' => 'Number',
      'hash'    => 'Text',
    );
  }
}
