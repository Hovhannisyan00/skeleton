import { Message, Notification } from 'element-ui';

window.El = {
  Message,
  Notification,
};

require('../bootstrap');
require('../core/dashboard-init');

require('./plugins/select.min');
require('./plugins/datatables.net');
require('./plugins/dataTablesBootstrap');
require('./plugins/jquery.mask.min');

require('jquery-datetimepicker');
require('../common/axios/axios');
require('../common/axios/errorHandler');
