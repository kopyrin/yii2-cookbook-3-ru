<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Post]].
 *
 * @see Post
 */
class PostQuery extends \yii\db\ActiveQuery
{
    /**
     * @param $lang
     *
     * @return $this
     */
    public function lang($lang)
    {
        return $this->where(['lang' => $lang]);
    }
}
