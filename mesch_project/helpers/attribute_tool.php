<?php
/*
mesch.ch project management

Copyright 2011 mesch web consulting & design GmbH, 
all portions of this codebase are copyrighted to the people 
listed in contributors.txt.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

class AttributeToolHelper {
   
   public function getAttributeDisplay($collection, $attributeHandle, $printLabel=true) {      
      Loader::model('collection_attributes');
      $ret = '';
            
      $attribute = CollectionAttributeKey::getByHandle($attributeHandle);
	  
      if ($collection != null) {
         $value = $collection->getAttributeValueObject($attribute);
      }
      
      if ($printLabel) {
         $ret  = "<label>" . $attribute->getAttributeKeyName() . "</label>";
      }
            
      $attributeValue = '';
      if ($collection != null) {
         if ($value != null) {
			//$attributeValue = $attribute->getAttributeValue($value->getAttributeValueID(), 'getValue');
			$attributeValue = $value->getValue('Display');
		 }
		 else {
			$attributeValue = $collection->getAttribute($attributeHandle);		 
		 }
	  }
      if ($attribute->getAttributeType()->getAttributeTypeHandle() == 'user_attribute') {
         if ($attributeValue == '') return;
         $ui = UserInfo::getByID($attributeValue);
         $ret .= $ui->getUserName();
      }
      else {
         $ret .= $attributeValue;
      }      
      //return get_class($attribute);
      return $ret;
   }   

   public function getAttributeForm($collection, $attributeHandle, $printLabel=true) {      
      Loader::model('collection_attributes');
      $ret = '';      
      
      $attribute = CollectionAttributeKey::getByHandle($attributeHandle);
      $value = '';
      if ($collection != null) {
         $value = $collection->getAttributeValueObject($attribute);
      }
      
      if ($printLabel) {
         $ret  = "<label>" . $attribute->getAttributeKeyName() . "</label>";
      }
      $ret .= $attribute->render('form',$value,true);
      
      return $ret;
   }
   
}
?>