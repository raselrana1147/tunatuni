<?php 


use App\Models\Admin\GeneralSetting;

function site_name()
{
	$data=GeneralSetting::first();
	return $data->site_name;
}

function site_tite()
{
	$data=GeneralSetting::first();
	return $data->title;
}

function copyright()
{
	$data=GeneralSetting::first();
	return $data->copyright;
}

function shipping_charge()
{
	$data=GeneralSetting::first();
	return $data->shipping_charge;
}
function tax()
{
	$data=GeneralSetting::first();
	return $data->tax;
}


function logo()
{
	$data=GeneralSetting::first();
	return $data->logo;
}

function favicon()
{
	$data=GeneralSetting::first();
	return $data->favicon;
}


function currency()
{
	$data=GeneralSetting::first();
	return $data->currency;
}


function default_image()
{
	$data=GeneralSetting::first();
	return $data->default_image;
}


function company_address()
{
	$data=GeneralSetting::first();
	return $data->company_address;
}


function description()
{
	$data=GeneralSetting::first();
	return $data->description;
}


function company_phone()
{
	$data=GeneralSetting::first();
	return $data->company_phone;
}


function company_email()
{
	$data=GeneralSetting::first();
	return $data->company_email;
}

