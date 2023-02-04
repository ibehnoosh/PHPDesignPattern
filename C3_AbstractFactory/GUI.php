<?php

abstract class GUI
{
    abstract public function button() : Button;
    abstract public function textFiled(): TextFiled;
    abstract public function frame(): Frame;
}
abstract class  Button
{
    abstract public function show();
}

abstract class  TextFiled
{
    abstract public function show();
}

abstract class  Frame
{
    abstract public function show();
}

class WindowsButton extends Button {public function show() {}}
class WindowsTextFiled extends TextFiled {public function show() {}}
class WindowsFrame  extends Frame {public function show() {}}
class windowsSUI extends GUI
{
     public function button() : WindowsButton
     { return new WindowsButton();}
     public function textFiled(): WindowsTextFiled
     { return  new WindowsTextFiled();}
     public function frame(): WindowsFrame
     { return  new WindowsFrame;}
}


class LinuxButton extends Button {public function show() {}}
class LinuxTextFiled extends TextFiled {public function show() {}}
class LinuxFrame  extends Frame {public function show() {}}
class LinuxSUI extends GUI
{
    public function button() : LinuxButton
    { return new LinuxButton();}
    public function textFiled(): LinuxTextFiled
    { return  new LinuxTextFiled();}
    public function frame(): LinuxFrame
    { return  new LinuxFrame;}
}

class MacButton extends Button {public function show() {}}
class MacTextFiled extends TextFiled {public function show() {}}
class MacFrame  extends Frame {public function show() {}}
class MacSUI extends GUI
{
    public function button() : MacButton
    { return new MacButton();}
    public function textFiled(): MacTextFiled
    { return  new MacTextFiled();}
    public function frame(): MacFrame
    { return  new MacFrame;}
}