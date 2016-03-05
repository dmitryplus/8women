<?php

class UploadFile {

	const DS = '/'; // OR DIRECTORY_SEPARATOR
	//const DS = DIRECTORY_SEPARATOR;


	public static function makePath($typeModel,$idModel){
		return Yii::getPathOfAlias('webroot').self::DS.Yii::app()->params['folder_upload'].self::DS.$typeModel.self::DS.$idModel;
	}

	public static function makeUrl($typeModel,$idModel){
		return Yii::app()->getBaseUrl(true).self::DS.Yii::app()->params['folder_upload'].self::DS.$typeModel.self::DS.$idModel;
	}



	public static function saveFromText($typeModel,$idModel, $name, $file){
	
		$data = explode(',', $file);
		$encodedData = str_replace(' ','+',$data[1]);
		$decodedData = base64_decode($encodedData);

		$ext = array_pop(explode('.',$name));
		$short_name = str_replace('.'.$ext, '', $name );

		$newName = str_replace('.'.$ext,'',self::translit($short_name))."-".date("YmdHis",time()).'.'.$ext;
		
		$folder = self::makePath($typeModel,$idModel);

		$newPath = $folder.self::DS.$newName;

		file_put_contents($newPath, $decodedData);

		return $newName;
	
	}



    public static function save($typeModel,$idModel,$files_field_name = 'upload', $need_file_name = '')
    {

		$Upload = CUploadedFile::getInstanceByName($files_field_name);

		if (is_null($Upload)) {

			return false;

		}

		$folder = self::makePath($typeModel,$idModel);



		if (!file_exists($folder)) {

			mkdir($folder, 0777, true);

		}

		if ( $need_file_name == '' ) {
			$newName = str_replace('.'.$Upload->getExtensionName(),'',self::translit($Upload->getName()))."-".date("YmdHis",time()).'.'.$Upload->getExtensionName();
		} else {
			//добавка для сохранения кадров под конкретным именем
			$newName = $need_file_name;
		}

		$newPath = $folder.self::DS.$newName;

		if ($Upload->saveAs($newPath)) {

			if (file_exists($newPath)){

				return $newName;

			} else {
				return false;
			}		
		} else {
			return false;
		}

    }



    public static function saves($typeModel,$idModel,$files_field_name = 'upload', $need_file_name = '')
    {


		$Uploads = CUploadedFile::getInstancesByName($files_field_name);


		if (is_null($Uploads)) {

			return false;

		}

		$folder = self::makePath($typeModel,$idModel);


		if (!file_exists($folder)) {

			mkdir($folder, 0777, true);

		}

		$arNames = array();	

		foreach ($Uploads as $Upload) {

			if ( $need_file_name == '' ) {
				$newName = str_replace('.'.$Upload->getExtensionName(),'',self::translit($Upload->getName()))."-".date("YmdHis",time()).'.'.$Upload->getExtensionName();
			} else {
				//добавка для сохранения кадров под конкретным именем
				$newName = $need_file_name;
			}

			$newPath = $folder.self::DS.$newName;

			if ($Upload->saveAs($newPath)) {

				if (file_exists($newPath)){

					$arNames[] = $newName;

				} else {
					return false;
				}		
			} else {
				return false;
			}
		}

		return $arNames;

    }



    public static function deleteFile($typeModel,$idModel,$file_name)
	{
		$path = self::makePath($typeModel,$idModel).self::DS.$file_name;
		if ( file_exists( $path ) ) {
			return unlink( $path );
		} else {
			return false;
		}
	}




	public static function translit($text,$standart='BGN'){


		//03.12.2009 транслитерация по нескольким стандартам, по умолчанию BGN
		//03.12.2009 Плющенков Дмитрий dmitry_plus@mail.ru

				$arStandart = array('BGN','LC','GOST','MVD');
				
				if (!in_array($standart,$arStandart)) return "Standart ERROR!";

				$arRus = array("А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ы", "Ь", "Э", "Ю", "Я", "а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я");

				$arBGN = array("A", "B", "V", "G", "D", "E", "E", "ZH", "Z", "I", "Y", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "KH", "TS", "CH", "SH", "SHCH", "", "Y", "", "E", "YU", "YA", "a", "b", "v", "g", "d", "e", "e", "zh", "z", "i", "y", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "kh", "ts", "ch", "sh", "shch", "", "y", "", "e", "yu", "ya");

				$arLC = array("A", "B", "V", "G", "D", "E", "E", "ZH", "Z", "I", "I", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "KH", "TS", "CH", "SH", "SHCH", "", "Y", "", "E", "IU", "IA", "a", "b", "v", "g", "d", "e", "e", "zh", "z", "i", "i", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "kh", "ts", "ch", "sh", "shch", "", "y", "", "e", "iu", "ia");

				$arGOST = array("A", "B", "V", "G", "D", "E", "JO", "ZH", "Z", "I", "JJ", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "KH", "C", "CH", "SH", "SHH", "", "Y", "", "EH", "JU", "JA", "a", "b", "v", "g", "d", "e", "jo", "zh", "z", "i", "jj", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "kh", "c", "ch", "sh", "shh", "", "y", "", "eh", "ju", "ja");

				$arMVD = array("A", "B", "V", "G", "D", "E", "YO", "ZH", "Z", "I", "Y", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "KH", "TS", "CH", "SH", "SHCH", "", "Y", "", "E", "YU", "YA", "a", "b", "v", "g", "d", "e", "yo", "zh", "z", "i", "y", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "kh", "ts", "ch", "sh", "shch", "", "y", "", "e", "yu", "ya");

				if ($standart==$arStandart[0]) $arTranslit = $arBGN;
				if ($standart==$arStandart[1]) $arTranslit = $arLC;
				if ($standart==$arStandart[2]) $arTranslit = $arGOST;
				if ($standart==$arStandart[3]) $arTranslit = $arMVD;

				$arSpecSimbols = array(' ',',','.',"'",'"',';',':','*','&','№','-','(',')','!','–','%','«','»','/','\\','_','²');

				$text = str_replace($arRus,$arTranslit,$text);
				$text = str_replace($arSpecSimbols,'_',trim($text));
				
				while (!strpos($text, "__") === false) $text = str_replace('__','_',$text);


				$text = str_replace('_JPG','.JPG',str_replace('_jpg','.jpg',$text));
				$text = str_replace('_GIF','.GIF',str_replace('_gif','.gif',$text));
				$text = str_replace('_PNG','.PNG',str_replace('_png','.png',$text));


		return $text;
	
	}




}