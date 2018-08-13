<?php namespace App\Services\Image;

use Gumlet\ImageResize;

class Image extends ImageResize
{
  protected $path;
  public $properties;
  public $text;

  public function __construct($filename)
  {
    parent::__construct($filename);
    $this->path = $filename;
    $this->properties = $this->getProperties();
  }

  /**
   * накладываем текст
   */
  public function text(string $text, array $options)
  {
    $position = $options['position'] ?? 'bottom';
    $font = $options['font'] ?? 'OpenSans-Semibold';
    $options['size'] = $options['size'] ?? 15;
    $options['top'] = $options['top'] ?? 15;
    $options['left'] = $options['left'] ?? 15;

    $this->text .= $text;
    $this->properties['font'] = $font;
    $this->properties['position'] = $position;
    $strlen = mb_strlen($text);

    $this->addFilter(function ($imageDesc) use ($strlen, $position, $text, $font, $options) {
      $color = ImageColorAllocate($imageDesc, 255, 255, 255); //получаем идентификатор цвета
      $image_width = imagesx($imageDesc);
      $image_height = imagesy($imageDesc);

      switch ($position) {
        case 'bottom' : 
          $x = $image_width - ($strlen * $options['left']);
          $y = $image_height - $options['top'];
          break;
        case 'top' :
          $y = $options['top'];
          $x = $image_width - ($strlen * $options['left']);
          break;
        case 'left' :
          $y = $image_height - $options['top'];
          $x = $options['left'];
          break;
        case 'left-top' :
          $y = $options['top'];
          $x = $options['left'];
          break;
      }
      ImageTTFtext($imageDesc, $options['size'], 0, $x, $y, $color, base_path("/resources/assets/fonts/{$font}.ttf") , $text);
    });
    return $this;
  }

  /**
   * изменяем размер
   */
  public function size(int $width, ?int $height = null)
  {
    if ('default' == $this->properties['filename']) {
      return $this;
    }
    $height = $height ?? $width;
    
    $this->properties['width'] = $width;
    $this->properties['height'] = $height;

    $this->crop($width, $height, self::CROPCENTER);

    return $this;
    // $this->save($newPath, null, 100);

    // return $this->getProperties($newPath);
  }

  public function get(?string $field = null)
  {
    $filename = md5(implode('-', $this->properties)) . '.' . $this->properties['extension'];
    $newPath = public_path('temp') . '/' . $filename;


    if (file_exists($newPath)) {
      $file = $this->getProperties($newPath);
      return $field ? $file[$field] : $file;
    }

    $this->save($newPath, null, 100);

    $file = $this->getProperties($newPath);
    return $field ? $file[$field] : $file;
  }

  protected function getProperties(?string $path = null): array
  {
    $screen = self::info($path ?? $this->path);

    return $screen;
  }

  public static function info(string $pathImage): array
  {
    $screen = pathinfo($pathImage);
    $screen['src'] = str_replace(public_path(), '', $pathImage);
    $screen['storage'] = str_replace(public_path() . '/storage', 'public', $pathImage);
    $screen['path'] = $screen['dirname'] . '/' . $screen['basename'];

    return $screen;
  }

}