<?php
$MESS["logicasoft.iblockevent_MODULE_NAME"] = 'Почтовые уведомления на события в инфоблоке';
$MESS["logicasoft.iblockevent_MODULE_DESC"] = 'Почтовые уведомления на события в инфоблоке';
$MESS["logicasoft.iblockevent_PARTNER_NAME"] = 'LogicaSoft LLC';
$MESS["logicasoft.iblockevent_PARTNER_URI"] = 'http://logicasoft.pro';
$MESS['LOGICASOFT_IBLOCKEVENT_TYPE_NAME'] = 'Уведомления на события в инфоблоке';
$MESS['LOGICASOFT_IBLOCKEVENT_TYPE_DESC'] = '

#EVENT_NAME# - Событие
#ID# - ID элемента
#CODE# - Символьный идентификатор
#XML_ID# - Внешний идентификатор
#NAME# - Название элемента
#IBLOCK_ID# - ID информационного блока
#IBLOCK_CODE# - Символический код инфоблока
#IBLOCK_NAME# - Название информационного блока
#IBLOCK_SECTION_ID# - ID группы
#IBLOCK_SECTION_CODE# - Символический код группы
#IBLOCK_SECTION_NAME# - Название группы
#IBLOCK_CODE# - Символический код инфоблока
#ACTIVE# - Флаг активности (Y|N)
#DATE_ACTIVE_FROM# - Дата начала действия элемента
#DATE_ACTIVE_TO# - Дата окончания действия элемента
#PREVIEW_PICTURE# - Ссылка на картинку для предварительного просмотра (анонса)
#PREVIEW_TEXT# - Предварительное описание (анонс)
#DETAIL_PICTURE# - Ссылка на картинку для детального просмотра
#DETAIL_TEXT# - Детальное описание
#DATE_CREATE# - Дата создания элемента
#CREATED_BY# - Код пользователя, создавшего элемент
#CREATED_USER_NAME# - Имя пользователя, создавшего элемент
#TIMESTAMP_X# - Время последнего изменения полей элемента
#MODIFIED_BY# - Код пользователя, в последний раз изменившего элемент
#USER_NAME# - Имя пользователя, в последний раз изменившего элемент
#LIST_PAGE_URL# - URL к странице для публичного просмотра списка элементов информационного блока
#DETAIL_PAGE_URL# - URL к странице для детального просмотра элемента
#SHOW_COUNTER# - Количество показов элемента
#SHOW_COUNTER_START# - Дата первого показа элемента
#WF_COMMENTS# - Комментарий администратора документооборота
#WF_STATUS_ID# - Код статуса элемента в документообороте
#LOCK_STATUS# - Текущее состояние блокированности на редактирование элемента
#TAGS# - Теги элемента
';
$MESS['LOGICASOFT_IBLOCKEVENT_EVENT_NAME'] = 'В инфоблоке "#IBLOCK_NAME#" #EVENT_NAME# элемент';
$MESS['LOGICASOFT_IBLOCKEVENT_EVENT_DESC'] = 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

На сайте #SERVER_NAME# в инфоблоке "#IBLOCK_NAME#" #EVENT_NAME# элемент

Данные:
Дата изменения: #TIMESTAMP_X#
ID элемента: #ID#
Название: #NAME#
Описание: #PREVIEW_TEXT#

Письмо сгенерировано автоматически.';