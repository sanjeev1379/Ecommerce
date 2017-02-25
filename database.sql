//table query

create table products{
  product_id(10) NOT NULL auto_increment,
  product_cat	int(100),
  product_brand	int(100),
  product_title	varchar(250),
  product_price	int(100),
  product_desc	text,
  product_image	text,
  product_keywords text
  }

//admin given the categories

  create table  categories{
    cat_id(100) NOT NULL auto_increment,
    cat_title	text
  }

//admin given the brand

    create table  brands{
      brand_id(100) NOT NULL auto_increment,
      brand_title	text
    }

//update cart query

   create table  cart{
        p_id	int(20),
        ip_add	varchar(255),
        qty	int(20)
    }

//user account query

   create table  account{
     cust_idPrimary	int(10) NOT NULL AUTO_INCREMENT ,
     first_name	varchar(50),
     last_name	varchar(50),
     mobile_no	bigint(12),
     email	varchar(50),
     profile_image	text,
     select_sex	varchar(20),
     birthday	date,
     address	text,
     password	varchar(50),
     password_again	varchar(50)
    }
