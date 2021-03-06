<?php

namespace app\models\sales;

use Yii;
use app\models\master\Customer;
use app\models\master\Branch;
use app\models\inventory\GoodsMovement;

/**
 * Sales
 *
 * @property SalesDtl[] $salesDtls
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Sales extends \biz\core\sales\models\Sales
{

    public function rules()
    {
        $rules = parent::rules();
        return array_merge([
            [['Date'], 'required'],
            [['nmCustomer'], 'in', 'range' => Customer::find()->select('name')->column()]
            ], $rules);
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
    }

    public function getSalesDtls()
    {
        return $this->hasMany(SalesDtl::className(), ['sales_id' => 'id']);
    }

    public function getGis()
    {
        return $this->hasMany(GoodsMovement::className(), ['reff_id' => 'id'])
                ->onCondition(['reff_type' => 200]);
    }
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return array_merge([
            [
                'class' => 'mdm\converter\DateConverter',
                'attributes' => [
                    'Date' => 'date',
                ]
            ],
            [
                'class' => 'mdm\converter\RelatedConverter',
                'attributes' => [
                    'nmCustomer' => [[Customer::className(), 'id' => 'customer_id'], 'name'],
                ],
            ],
            ], $behaviors);
    }
}