<?php
namespace App\Traits;

use App\Models\Order;
use App\Models\Table;
use Carbon\Carbon;
use Exception;

trait OrderRerender {


  static $MINIMUM_QUANTITY = 1;

  protected function getOrderItems()
  {
      if( $this->hasOrderOnline() ){
          return $this->useOrderOnline()->items;
      }

      return collect();
  }

  protected function getTotalOrder()
  {
      $content = $this->getOrderItems();

      $total = $content->reduce(function ($total, $item) {
          return $total += $item->price * $item->quantity;
      });

      return $total ?? 0;
  }

  protected function getCountItemsOrder(): int
  {
      return (int)$this->getOrderItems()->count();
  }

  public function hasItemsInOrder($productId): bool
  {
    if( !$this->hasOrderOnline() ){
        return false;
    }
      return $this->useOrderOnline()->items()
      ->whereProductId($productId)
      ->exists();
  }

  public function remove(string $id): void
  {
     $this->useOrderOnline()->items()->find($id)->delete();
  }

  protected function clear(): void
  {
      $this->useOrderOnline()->delete();
  }

  public function update(string $id, string $action): void
  {
      $content = $this->useOrderOnline()->items();

      if ($cartItem = $content->find($id)) {

          switch ($action) {
              case 'plus':
                  $cartItem->increment('quantity', 1);
                  break;
              case 'minus':

                  if ($cartItem->quantity < self::$MINIMUM_QUANTITY) {
                      break;
                  }
                  $cartItem->decrement('quantity', 1);
                  break;
          }
      }
  }


  protected function findIdTableByToken(): int
  {
      $tableToken = session()->get('TokenTable');

      $table = Table::whereToken($tableToken);

      if( !$table = $table->first() ){

          throw new Exception('Not find Token tbl');
      }

      return $table->id;
  }

  protected function hasOrderOnline() : bool
  {
      $table = $this->findIdTableByToken();

      return Order::whereTableId($table)
                  ->whereDate('created_at', '>=', Carbon::now()->addMinutes(10))
                  ->whereStatus('Processing')
                  ->exists();

  }

  protected function useOrderOnline()
  {
      $tbl = $this->findIdTableByToken();
      return Order::whereTableId($tbl)->whereStatus('Processing')->first();
  }

  protected function ceateOrder()
  {
    return Order::create([
        'table_id' => $this->findIdTableByToken()
    ]);
  }

}
