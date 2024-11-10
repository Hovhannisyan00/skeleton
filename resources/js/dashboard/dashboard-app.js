import { ElMessage, ElNotification } from 'element-plus/dist/index.full.min';

window.El = {
  Message: ElMessage,
  Notification: ElNotification,
};

require('../core/bootstrap');
require('../core/dashboard-init');

require('../plugins/select.min');
require('../plugins/datatables.net');
require('../plugins/dataTablesBootstrap');
require('../plugins/jquery.mask.min');

require('jquery-datetimepicker');
require('../common/axios/axios');
require('../common/axios/errorHandler');

require('./src/vue-init');
