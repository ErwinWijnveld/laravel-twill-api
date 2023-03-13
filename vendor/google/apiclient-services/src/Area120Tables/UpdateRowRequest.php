<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Area120Tables;

class UpdateRowRequest extends \Google\Model
{
  protected $rowType = Row::class;
  protected $rowDataType = '';
  public $row;
  /**
   * @var string
   */
  public $updateMask;
  /**
   * @var string
   */
  public $view;

  /**
   * @param Row
   */
  public function setRow(Row $row)
  {
    $this->row = $row;
  }
  /**
   * @return Row
   */
  public function getRow()
  {
    return $this->row;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  /**
   * @param string
   */
  public function setView($view)
  {
    $this->view = $view;
  }
  /**
   * @return string
   */
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateRowRequest::class, 'Google_Service_Area120Tables_UpdateRowRequest');
