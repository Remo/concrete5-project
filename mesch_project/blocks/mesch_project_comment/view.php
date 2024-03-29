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

defined('C5_EXECUTE') or die(_("Access Denied."));

$dfh = Loader::helper('date_formatter', 'mesch_project');

echo "<div class=\"remo_board_message\">";		
	echo "<div class=\"remo_board_left_column\">";
		if (ENABLE_USER_PROFILES) { 
			echo t('Updated by') . ' <a name="'.$bID.'" href="' . View::url("/profile", $userID) . '">'.$author.'</a> on ' . $dfh->formatDate(strtotime($createdOn));
		}
		else {
			echo t('Updated by') . " <a name=\"{$bID}\">{$author}</a> on " . $dfh->formatDate(strtotime($createdOn));
		}
   echo "<hr/>";
	echo "</div>";
	echo "<div class=\"remo_board_right_column\">";	
		echo "<p>{$text}</p>";
      
      if ($fID > 0) {
         $f = File::getByID($fID);
         $fv = $f->getApprovedVersion();
         $fvUrl = $fv->getURL();
         $fvName = $fv->getFileName();
         echo "<a href=\"{$fvUrl}\">{$fvName}</a>";
      }
	echo "</div>";
	echo "<div class=\"clear\"></div>";
echo "</div>";
?>