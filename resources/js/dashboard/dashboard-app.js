import { Message, Notification } from 'element-ui';

window.El = {
  Message,
  Notification,
};
window.isDashboard = true;

require('../bootstrap');
require('./main');
// eslint-disable-next-line import/extensions
require('./plugins/Select2 4.1.0.min.js');
require('../core/axios');
require('../core/errorHandler');
require('./plugins/datatables.net');
// eslint-disable-next-line import/extensions
require('./plugins/DataTablesBootstrap.js');
require('./plugins/jquery.mask.min');
require('jquery-datetimepicker');
