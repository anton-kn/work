## Cайт на Yii2

Сайт состоит из следующих страниц:
1. Главная страница - представляет собой список пользователей

2. Страница отправки заявки (www.example.loc/request/create) - представляет
собой форму со следующими полями:
- выбор получателя из списка пользователей
- контактные данные отправителя
- текст заявки

3. Страница пользователя (www.example.loc/request/create/?user = ([a-zA-Z0-9]+)) - у каждого пользователя есть произвольный текстовый альяс (кроме request), по
которому открывается его страница. На ней данные пользователя +
форма заявки без выбора получателя

4. Админка (CRUD) для управления пользователями и заявками
При отправке заявки из общей формы после выбора пользователя получателя
подгружать с помощью ajax и отображать сведения о нём.