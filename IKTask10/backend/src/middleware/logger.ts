import Router from 'express';
import fs from 'fs';
import CONSTANT from '../config/CONSTANT';

const logger = require('express-elasticsearch-logger');
//
//
//
const router = new Router();
//
router.use(logger.requestHandler({ host: `http://${CONSTANT.POSTGRES_HOST}:9200` }));
router.use(logger.errorHandler);

export default router;