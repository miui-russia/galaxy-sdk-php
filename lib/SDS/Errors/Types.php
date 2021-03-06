<?php
namespace SDS\Errors;

/**
 * Autogenerated by Thrift Compiler (0.9.2)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


/**
 * HTTP状态码列表，用于传输层，签名错误等
 */
final class HttpStatusCode {
  /**
   * 请求格式错误，常见原因为请求参数错误导致服务端反序列化失败
   */
  const BAD_REQUEST = 400;
  /**
   * 无效的认证信息，一般为签名错误
   */
  const INVALID_AUTH = 401;
  /**
   * 客户端时钟不同步，服务端拒绝(为防止签名的重放攻击)
   */
  const CLOCK_TOO_SKEWED = 412;
  /**
   * HTTP请求过大
   */
  const REQUEST_TOO_LARGE = 413;
  /**
   * 内部错误
   */
  const INTERNAL_ERROR = 500;
  static public $__names = array(
    400 => 'BAD_REQUEST',
    401 => 'INVALID_AUTH',
    412 => 'CLOCK_TOO_SKEWED',
    413 => 'REQUEST_TOO_LARGE',
    500 => 'INTERNAL_ERROR',
  );
}

/**
 * 错误码列表，用于逻辑层错误
 */
final class ErrorCode {
  /**
   * 系统内部错误
   */
  const INTERNAL_ERROR = 1;
  /**
   * 系统不可用
   */
  const SERVICE_UNAVAILABLE = 2;
  /**
   * 未知错误
   */
  const UNKNOWN = 3;
  const END_OF_INTERNAL_ERROR = 20;
  /**
   * 无访问对应资源权限
   */
  const ACCESS_DENIED = 21;
  /**
   * 无效参数
   */
  const VALIDATION_FAILED = 22;
  /**
   * 长度超限(大小，数目等)
   */
  const SIZE_EXCEED = 23;
  /**
   * 空间配额超限
   */
  const QUOTA_EXCEED = 24;
  /**
   * 表读写配额超限
   */
  const THROUGHPUT_EXCEED = 25;
  /**
   * 资源不存在(如表，应用)
   */
  const RESOURCE_NOT_FOUND = 26;
  /**
   * 资源已存在(如表)
   */
  const RESOURCE_ALREADY_EXISTS = 27;
  /**
   * 资源暂时不可用(如表并发管理操作加锁尚未释放)
   */
  const RESOURCE_UNAVAILABLE = 28;
  /**
   * 客户端API版本不支持
   */
  const UNSUPPORTED_VERSION = 29;
  /**
   * 暂时不支持的操作
   */
  const UNSUPPORTED_OPERATION = 30;
  /**
   * 无效的认证信息(签名不正确，不包含签名过期)
   */
  const INVALID_AUTH = 31;
  /**
   * 客户端时钟不同步
   */
  const CLOCK_TOO_SKEWED = 32;
  /**
   * HTTP请求过大
   */
  const REQUEST_TOO_LARGE = 33;
  /**
   * 无效请求
   */
  const BAD_REQUEST = 34;
  /**
   * HTTP传输层错误
   */
  const TTRANSPORT_ERROR = 35;
  /**
   * 不支持的thrift协议类型
   */
  const UNSUPPORTED_TPROTOCOL = 36;
  /**
   * 请求超时
   * 
   */
  const REQUEST_TIMEOUT = 37;
  static public $__names = array(
    1 => 'INTERNAL_ERROR',
    2 => 'SERVICE_UNAVAILABLE',
    3 => 'UNKNOWN',
    20 => 'END_OF_INTERNAL_ERROR',
    21 => 'ACCESS_DENIED',
    22 => 'VALIDATION_FAILED',
    23 => 'SIZE_EXCEED',
    24 => 'QUOTA_EXCEED',
    25 => 'THROUGHPUT_EXCEED',
    26 => 'RESOURCE_NOT_FOUND',
    27 => 'RESOURCE_ALREADY_EXISTS',
    28 => 'RESOURCE_UNAVAILABLE',
    29 => 'UNSUPPORTED_VERSION',
    30 => 'UNSUPPORTED_OPERATION',
    31 => 'INVALID_AUTH',
    32 => 'CLOCK_TOO_SKEWED',
    33 => 'REQUEST_TOO_LARGE',
    34 => 'BAD_REQUEST',
    35 => 'TTRANSPORT_ERROR',
    36 => 'UNSUPPORTED_TPROTOCOL',
    37 => 'REQUEST_TIMEOUT',
  );
}

final class RetryType {
  /**
   * 安全重试，比如建立链接超时，时钟偏移太大等错误，可以安全的进行自动重试
   */
  const SAFE = 0;
  /**
   * 非安全重试，比如操作超时，系统错误等，需要开发者显式指定，系统不应自动重试
   */
  const UNSAFE = 1;
  static public $__names = array(
    0 => 'SAFE',
    1 => 'UNSAFE',
  );
}

/**
 * RPC调用错误
 */
class ServiceException extends TException {
  static $_TSPEC;

  /**
   * 错误码
   * 
   * @var int
   */
  public $errorCode = null;
  /**
   * 错误信息
   * 
   * @var string
   */
  public $errorMessage = null;
  /**
   * 错误信息细节
   * 
   * @var string
   */
  public $details = null;
  /**
   * RPC调用标识
   * 
   * @var string
   */
  public $callId = null;
  /**
   * 请求标识
   * 
   * @var string
   */
  public $requestId = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'errorCode',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'errorMessage',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'details',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'callId',
          'type' => TType::STRING,
          ),
        5 => array(
          'var' => 'requestId',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['errorCode'])) {
        $this->errorCode = $vals['errorCode'];
      }
      if (isset($vals['errorMessage'])) {
        $this->errorMessage = $vals['errorMessage'];
      }
      if (isset($vals['details'])) {
        $this->details = $vals['details'];
      }
      if (isset($vals['callId'])) {
        $this->callId = $vals['callId'];
      }
      if (isset($vals['requestId'])) {
        $this->requestId = $vals['requestId'];
      }
    }
  }

  public function getName() {
    return 'ServiceException';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->errorCode);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->errorMessage);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->details);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->callId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->requestId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ServiceException');
    if ($this->errorCode !== null) {
      $xfer += $output->writeFieldBegin('errorCode', TType::I32, 1);
      $xfer += $output->writeI32($this->errorCode);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->errorMessage !== null) {
      $xfer += $output->writeFieldBegin('errorMessage', TType::STRING, 2);
      $xfer += $output->writeString($this->errorMessage);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->details !== null) {
      $xfer += $output->writeFieldBegin('details', TType::STRING, 3);
      $xfer += $output->writeString($this->details);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->callId !== null) {
      $xfer += $output->writeFieldBegin('callId', TType::STRING, 4);
      $xfer += $output->writeString($this->callId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->requestId !== null) {
      $xfer += $output->writeFieldBegin('requestId', TType::STRING, 5);
      $xfer += $output->writeString($this->requestId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

final class Constant extends \Thrift\Type\TConstant {
  static protected $ERROR_BACKOFF;
  static protected $ERROR_RETRY_TYPE;
  static protected $MAX_RETRY;

  static protected function init_ERROR_BACKOFF() {
    return     /**
     * SDK自动重试的错误码及回退(backoff)基准时间，
     * 等待时间 = 2 ^ 重试次数 * 回退基准时间
     */
array(
            2 => 1000,
            25 => 1000,
            37 => 0,
            32 => 0,
            1 => 1000,
            35 => 1000,
    );
  }

  static protected function init_ERROR_RETRY_TYPE() {
    return     /**
     * 错误码所对应的重试类型
     */
array(
            2 =>       0,
            25 =>       0,
            37 =>       0,
            32 =>       0,
            1 =>       1,
            35 =>       1,
    );
  }

  static protected function init_MAX_RETRY() {
    return     /**
     * 抛出异常之前最大重试次数
     */
1;
  }
}


