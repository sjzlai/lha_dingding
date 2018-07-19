<?php
return [
	// AccountSid 主帐号
	'accountSid' => '8aaf07085f004cdb015f0e728a5d05e0',
	// 主帐号Token
	'accountToken' => 'a6b8a429a29845df9c03d2a0529fe35e',
	// AppId 应用ID
	'appId' => '8a216da85f008800015f0e8f05810518',
	// SubAccountSid 子帐号
	'subAccountSid' => '',
	// SubAccountToken 子帐号Token(密码)
	'subAccountToken' => '',
	// VoIPAccount VoIP帐号
	'voIPAccount' => '',
	// VoIPPassword VoIP密码
	'voIPPassword' => '', 
	//请求地址，格式如下，不需要写https://
	'serverIP' => 'app.cloopen.com',
	//请求端口
	'serverPort' => '8883',
	//REST版本号 云通讯固定版本号,除非接口升级外,不要修改版本号
	'softVersion' => '2013-12-26',
	//包体格式，可填值：json 、xml
	'bodyType' => 'json',
	//日志开关。可填值：true、false
	'enabeLog' => true,

	/**
	 * 双向回呼全局配置
	 * @author 晚黎
	 * @date   2016-04-06T15:51:59+0800
	 * @param  [type]   customerSerNum  [被叫侧显示的客服号码]
	 * @param  [type]   fromSerNum      [主叫侧显示的号码]
	 * @param  [type]   promptTone      [自定义回拨提示音]
	 * @param  [type]   alwaysPlay      [第三方私有数据]
	 * @param  [type]   terminalDtmf    [最大通话时长]
	 * @param  [type]   userData        [实时话单通知地址]
	 * @param  [type]   maxCallTime     [是否一直播放提示音]
	 * @param  [type]   hangupCdrUrl    [用于终止播放promptTone参数定义的提示音]
	 * @param  [type]   needBothCdr     [是否给主被叫发送话单]
	 * @param  [type]   needRecord      [是否录音]
	 * @param  [type]   countDownTime   [设置倒计时时间]
	 * @param  [type]   countDownPrompt [倒计时时间到后播放的提示音]
	 *
	 * 不使用全局配置，局部使用需添加额外参数，例如在控制器中调用：
	 * Cloud::callBack($from,$to,$options  = []);
	 * 当传入$options参数时，全局方法不起作用，$options数组中的key对应上面参数说明
	 */
	'callBack' => [
		'customerSerNum'	=> '',
		'fromSerNum' 		=> '',
		'promptTone' 		=> '',
		'alwaysPlay' 		=> '',
		'terminalDtmf' 		=> '',
		'userData' 			=> '',
		'maxCallTime' 		=> '',
		'hangupCdrUrl' 		=> '',
		'needBothCdr' 		=> '',
		'needRecord' 		=> '',
		'countDownTime'		=> '',
		'countDownPrompt' 	=> ''
	]
];