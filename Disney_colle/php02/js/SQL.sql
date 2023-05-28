INSERT INTO Disney_colle(year,place,category,img,naiyou,indate)VALUES('1999','ランド','メダル','画像','ないよう',sysdate());

//本番用 insert.php用
INSERT INTO Disney_colle(year,place,category,img,naiyou,indate)VALUES(:year, :place, :category, :img, :naiyou, sysdate());