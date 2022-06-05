<?php

use yii\db\Migration;
use backend\models\User;

/**
 * Class m220522_135325_create_rbac_data
 */
class m220522_135325_create_rbac_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()    {
     
        $auth = Yii::$app->authManager;
        
        //add roles
        $employerRole = $auth->createRole('employer');
        $auth->add($employerRole);
        
        $applicantRole = $auth->createRole('applicant');
        $auth->add($applicantRole);
        
        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);
        
        
        //add the rule
        $employerRule = new \common\rbac\EmployerRule;
        $auth->add($employerRule);
        
        $resumeRule = new \common\rbac\ResumeRule;
        $auth->add($resumeRule);
        
        
        //Define premission
        $сreateResumePermission = $auth->createPermission('createResume');
        $сreateResumePermission->description = 'Create a resume';
        $auth->add($сreateResumePermission);
        
        $updateResumePermission = $auth->createPermission('updateResume');
        $updateResumePermission->description = 'Update resume';
        $auth->add($updateResumePermission);
        
        $updateOwnResumePermission = $auth->createPermission('updateOwnResume');
        $updateOwnResumePermission->description = 'Update own resume';
        $updateOwnResumePermission->ruleName = $employerRule->name;
        $auth->add($updateOwnResumePermission);
        
        
        $сreateVacancyPermission = $auth->createPermission('createVacancy');
        $сreateVacancyPermission->description = 'Create a vacancy';
        $auth->add($сreateVacancyPermission);
        
        $updateVacancyPermission = $auth->createPermission('updateVacancy');
        $updateVacancyPermission->description = 'Update vacancy';
        $auth->add($updateVacancyPermission);

        $updateOwnVacancyPermission = $auth->createPermission('updateOwnVacancy');
        $updateOwnVacancyPermission->description = 'Update own vacancy';
        $updateOwnVacancyPermission->ruleName = $employerRule->name;
        $auth->add($updateOwnVacancyPermission);
        
        
        $auth->addChild($employerRole, $сreateVacancyPermission);
        $auth->addChild($employerRole, $updateOwnVacancyPermission);
        
        $auth->addChild($applicantRole, $updateOwnResumePermission);
        $auth->addChild($applicantRole, $сreateResumePermission);
        
        $auth->addChild($adminRole, $employerRole);
        $auth->addChild($adminRole, $applicantRole);
        $auth->addChild($adminRole, $updateVacancyPermission);
        $auth->addChild($adminRole, $updateResumePermission);
        
        $auth->addChild($updateOwnVacancyPermission, $updateVacancyPermission); 
        $auth->addChild($updateOwnResumePermission, $updateResumePermission); 
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220522_135325_create_rbac_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220522_135325_create_rbac_data cannot be reverted.\n";

        return false;
    }
    */
}
