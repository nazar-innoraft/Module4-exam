<?php

declare(strict_types=1);

namespace Drupal\blogs_api\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Blogs api routes.
 */
final class BlogsApiController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {

    $conn = \Drupal\Core\Database\Database::getConnection();

    $result = $conn->query("SELECT title FROM node_field_data WHERE type = :blogs", [':blogs' => 'blogs']);
    $datas = $result->fetchAll();

    // $string_version = implode('\n', $datas);
    // dd($string_version);
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t(''),
    ];

    return $build;
  }

}
