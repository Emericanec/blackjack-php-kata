#language: ru
Функциональность: Игра подготовлена

  Сценарий: Минимальная ставка в игре
    Допустим Игорь хочет испытать удачу в blackjack
    Когда он делает ставку 4 фишек
    Тогда дилер сообщает ему:
      | Ошибка               |
      | минимальная ставка 5 |

  Сценарий: Игрок может играть в blackjack
    Допустим Игорь хочет испытать удачу в blackjack
    Когда он делает ставку 5 фишек
    Тогда дилер сдаёт ему 2 карты

  Структура сценария: Дилер сдает карты до тех пор пока сумма не будет 17 или больше
    Допустим дилер начинает набирать себе <карты>
    Когда дилер закончил брать карты
    Тогда дилер совершает <действие>

    Примеры:
      | карты                           | действие              |
      | K,K                             | перестает брать карты |
      | 2,K                             | взять еще карту       |
      | A,A                             | взять еще карту       |
      | A,A,A,A,A,A,A,A,A,A,A,A,A,A,A,A | взять еще карту       |
      | K,9,A                           | перестает брать карты |


#Функциональность: Дилер сдает карты до тех пор пока у него не будет 17 или больше
