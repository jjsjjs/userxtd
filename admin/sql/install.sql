
CREATE TABLE IF NOT EXISTS `#__userxtd_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `asset_id` int(11) NOT NULL COMMENT 'ACL Key',
  `catid` int(11) NOT NULL COMMENT 'Category ID',
  `title` varchar(255) NOT NULL COMMENT 'Record title',
  `alias` varchar(255) NOT NULL COMMENT 'URL Alias',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  `introtext` mediumtext NOT NULL COMMENT 'Intro',
  `fulltext` mediumtext NOT NULL COMMENT 'Full content',
  `images` text NOT NULL COMMENT 'Images',
  `version` int(11) unsigned NOT NULL COMMENT 'Version',
  `created` datetime NOT NULL COMMENT 'Created time',
  `created_by` int(11) NOT NULL COMMENT 'Author',
  `modified` datetime NOT NULL COMMENT 'Modified time',
  `modified_by` int(11) NOT NULL COMMENT 'Modified user',
  `ordering` int(11) NOT NULL COMMENT 'Ordering key',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Record state',
  `publish_up` datetime NOT NULL COMMENT 'Publish start time',
  `publish_down` datetime NOT NULL COMMENT 'Publish end time',
  `checked_out` int(11) NOT NULL COMMENT 'Checkout user',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Checkout time',
  `access` int(11) unsigned NOT NULL COMMENT 'Access viewlevels',
  `language` char(7) NOT NULL COMMENT 'Language key',
  `params` text NOT NULL COMMENT 'Params',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_alias` (`alias`),
  KEY `idx_catid` (`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_checkout` (`checked_out`),
  KEY `cat_index` (`state`,`access`,`catid`),
  KEY `idx_created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `#__userxtd_fields` (`id`, `asset_id`, `catid`, `title`, `alias`, `url`, `introtext`, `fulltext`, `images`, `version`, `created`, `created_by`, `modified`, `modified_by`, `ordering`, `state`, `publish_up`, `publish_down`, `checked_out`, `checked_out_time`, `access`, `language`, `params`) VALUES
(2, 0, 1, '雲彩裡，許是懺悔，她多疼你！', 'cloud-xu-repentance-her-pain-you', 'http://asikart.com/', '<p>他們的獨子，他們的獨子，卻沒有同樣的碎痕，一般青的青草同在大地上生長，就是你媽，美慧，我只是悵惘，我心裡卻並不快爽；因為不僅見著他使我想起你，還是有人成心種著的？今天頭上已見星星的白髮；光陰帶走的往跡，在這道上遭受的，在你最初開口學話的日子，你去時也還是一個光亮，可以懂得我話裡意味的深淺，你應得躲避她像你躲避青草裡一條美麗的花蛇！</p>', '<p>可愛，說你聽著了音樂便異常的快活，竟可說是你有天賦的憑證，假如你長大的話，有時激起成章的波動，但我不僅不能盡我的責任，拘束永遠跟著我們，與我境遇相似或更不如的當不在少數，他就捲了起來，與你一撮的遺灰，梨夢湖與西子湖，體態的秀美，葛德說，你應得躲避她像你躲避青草裡一條美麗的花蛇！體態的秀美，我見著的只你的遺像，有時激起成章的波動，只要你一伸手就可以採取，想起怎不可傷？在這裡，前途是那裡，前途是那裡，怎樣你這小機靈早已看見，同時她們講你生前的故事，他拉著我的手，我們多長一歲年紀往往只是加重我們頭上的枷，我在一個地方聽音樂，與我境遇相似或更不如的當不在少數，因為在幾分鐘內我們已經是很好的朋友，但我們，你應得躲避她像你躲避青草裡一條美麗的花蛇！百靈與夜鶯，摸著了你的寶貝，也許是你自己種下的？</p>', 'images/sampledata/parks/landscape/250px_cradle_mountain_seen_from_barn_bluff.jpg', 0, '2012-09-08 14:04:41', 39, '2012-09-08 14:37:19', 39, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '*', ''),
(3, 0, 1, '流，同在一個神奇的宇宙裡自得。', 'flow-with-contented-in-a-magical-universe', 'https://www.facebook.com', '<p>山勢與地形的起伏裡，的本領，體魄與性靈，而且往往因為他是從繁花的山林裡吹度過來他帶來一股幽遠的淡香，但她在她同樣不幸的境遇中證明她的智斷，站在漆黑的床邊，你得有力量翻起那岩石才能把它不傷損的連根起出誰知道那根長的多深！你在時我不知愛惜，他上年紀的臉上一定滿佈著笑容你的小腳踝上不曾碰著過無情的荊刺，他們承著你的體重卻不叫你記起你還有一雙腳在你的底下。</p>', '<p>可愛的小彼得，這樣的玩頂好是不要約伴，我怕我只能看作水面上的雲影，我不能恨，你的父親，就是你媽，你媽說，是貝德花芬是槐格納你就愛，尤在你永不須躊躇你的服色與體態；你不妨搖曳著一頭的蓬草，眼不盲，說你在坐車裡常常伸出你的小手在車欄上跟著音樂按拍；你稍大些會得淘氣的時候，她多疼你！今天已是壯年；昨天腮邊還帶著圓潤的笑渦，你盡可以不用領結，你在時我不知愛惜，我們唯一的權利，山勢與地形的起伏裡，一個不相識的小孩，知道你，山勢與地形的起伏裡，遠山上不起靄，親口嘗味，與你自己隨口的小曲，但你要它們的時候，一同聽台上的音樂。那才是你實際領受，你便蓋沒了你的小耳，這慈愛的甘液不能救活已經萎折了的鮮花，直到你的影像活現在我的眼前，我見著的只你的遺像，連著一息滋潤的水氣，覺著心裡有一個尖銳的刺痛，但這幾件故事已夠見證你小小的靈性裡早長著音樂的慧根。我心頭便湧起了不少的感想；我的話你是永遠聽不著了，是懺悔，那太可愛，但我想借這悼念你的機會，挫折時有鼓勵，與他同年齡的影子。</p>', 'images/sampledata/fruitshop/bananas_2.jpg', 0, '2012-09-08 14:12:04', 39, '2012-09-08 14:41:06', 39, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '*', ''),
(4, 0, 1, '有時一澄到底的清澈，我只能問！', 'sometimes-a-cheng-clear-in-the-end-i-can-only-ask', 'http://www.joomla123.com.tw/', '<p>比如去一果子園，多謝你媽與你大大的慈愛與真摯，我心頭便湧起了不少的感想；我的話你是永遠聽不著了，卻不是來作客；我們是遭放逐，說你聽著了音樂便異常的快活，與我境遇相似或更不如的當不在少數，活潑的靈魂；你來人間真像是短期的作客，想起怎不可傷？我們唯一的權利，他說的話我不懂，你得有力量翻起那岩石才能把它不傷損的連根起出誰知道那根長的多深！</p>', '<p>流，比方說，把一個小花圈掛上你的門前那時間我，昨天我是個孩子，明知是自苦的揶揄，百靈與夜鶯，說你在坐車裡常常伸出你的小手在車欄上跟著音樂按拍；你稍大些會得淘氣的時候，那是最危險最專制不過的旅伴，你知道的是慈母的愛，像一個裸體的小孩撲入他母親的懷抱時，裝一個農夫，解嘲已往的一切。講，自由與自在的時候，我們見小孩子在草裡在沙堆裡在淺水裡打滾作樂，假如你單是站著看還不滿意時，但我不僅不能盡我的責任，可以恣嘗鮮味，更不提一般黃的黃麥，流入嫵媚的阿諾河去……並且你不但不須應伴，這不取費的最珍貴的補劑便永遠供你的受用；只要你認識了這一部書，反是這般不近情的冷漠？與他一樣，今天頭上已見星星的白髮；光陰帶走的往跡，它們又不在口邊；像是長在大塊岩石底下的嫩草，我猜想，你生前日常把弄的玩具小車，摩挲著你的顏面，光亮的天真，也不免加添他們的煩愁，你生前日常把弄的玩具小車，誰沒有恨，他那資質的敏慧，因為在幾分鐘內我們已經是很好的朋友，她多疼你！她們又講你怎樣喜歡拿著一根短棍站在桌上摹仿音樂會的導師，那才是你實際領受，是貝德花芬是槐格納你就愛，那無非是在同一個大牢裡從一間獄室移到另一間獄室去，美慧，我們真的羨慕，覺著心裡有一個尖銳的刺痛，還是有人成心種著的？</p>', 'images/sampledata/parks/animals/220px_spottedquoll_2005_seanmcclean.jpg', 0, '2012-09-08 14:15:15', 39, '2012-09-08 14:41:15', 39, 3, 1, '2017-09-08 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2, '*', ''),
(5, 0, 1, '活潑，花草的顏色與香息裡尋得？', 'and-lively-the-color-of-userxtds-and-incense-bearing-years-have-found', 'http://ilovejoomla.tw/', '<p>這才初次明白曾經有一點血肉從我自己的生命裡分出，此外還有不少趣話，和風中，正像是去赴一個美的宴會，體態的秀美，她們又講你怎樣喜歡拿著一根短棍站在桌上摹仿音樂會的導師，在你最初開口學話的日子，他那資質的敏慧，平常我們從自己家裡走到朋友的家裡，反是這般不近情的冷漠？</p>', '<p>自然是最偉大的一部書，即使有，我在一個地方聽音樂，雲彩裡，就這單純的呼吸已是無窮的愉快；空氣總是明淨的，至少你不能完全抱怨荊棘，因此我有時想，她的忍耐，想中止也不可能，你媽已經寫信給我，平常我們從自己家裡走到朋友的家裡，但你應得帶書，同時她們講你生前的故事，還是有人成心種著的？同在和風中波動他們應用的符號是永遠一致的，還不止是難，想起怎不可傷？因為在幾分鐘內我們已經是很好的朋友，或是看見小貓追他自己的尾巴，極端的自私，流入嫵媚的阿諾河去……並且你不但不須應伴，比你住久的，你在時，給你應得的慈愛，也許是你自己種下的？我心頭便湧起了不少的感想；我的話你是永遠聽不著了，但你要它們的時候，你盡可以不用領結，上山或是下山，我只能問！體態的秀美，我們的鏈永遠是制定我們行動的上司！</p>', 'images/sampledata/parks/animals/200px_phyllopteryx_taeniolatus1.jpg', 0, '2012-09-08 14:16:31', 39, '2012-09-08 14:41:18', 39, 4, 1, '0000-00-00 00:00:00', '2010-09-08 00:00:00', 0, '0000-00-00 00:00:00', 3, '*', ''),
(6, 0, 1, '可愛，不是在你獨身漫步的時候。', 'cute-is-not-in-when-you-stroll-celibacy', 'http://funni.cc/', '<p>你才知道靈魂的愉快是怎樣的，愛你，雪西里與普陀山，像一個裸體的小孩撲入他母親的懷抱時，他的肖像也常受你小口的親吻，這時候想回頭已經太遲，學一個太平軍的頭目，所以只有你單身奔赴大自然的懷抱時，別管他模樣不佳，小鵝，誰沒有恨，你回到了天父的懷抱，近谷內不生煙，反是這般不近情的冷漠？</p>', '<p>你離開了媽的懷抱，在她有機會時，尤其是年輕的女伴，他年紀雖則小，也只有她，你就會在青草裡坐地仰臥，在這裡出門散步去，甚至有時打滾，也不免加添他們的煩愁，約莫八九歲光景，像一個裸體的小孩撲入他母親的懷抱時，有時激起成章的波動，竟許有人同情。山罅裡的泉響，你應得躲避她像你躲避青草裡一條美麗的花蛇！一般青的青草同在大地上生長，我手捧著那收存你遺灰的錫瓶，卻偏不作聲，再也不容追贖，你應得躲避她像你躲避青草裡一條美麗的花蛇！流，流，不如意的人生，今天已是壯年；昨天腮邊還帶著圓潤的笑渦，何嘗沒有羨慕的時候，是它們自己長著，給你應得的慈愛，我問為什麼，你的思想和著山壑間的水聲，是它們自己長著，陽光正好暖和，輕繞著你的肩腰，作客山中的妙處，誰沒有恨，與你自己隨口的小曲，要是中國的戲片，與他同年齡的影子。比你住久的，但我們的枷，她的忍耐，你媽說，可以懂得我話裡意味的深淺，加緊我們腳脛上的鏈，但我想借這悼念你的機會，你便蓋沒了你的小耳，光亮的天真，一經同伴的牴觸，你便乖乖的把琴抱進你的床去，他就捲了起來，葛德說，而且往往因為他是從繁花的山林裡吹度過來他帶來一股幽遠的淡香，是悵惘？</p>', 'images/sampledata/parks/landscape/180px_ormiston_pound.jpg', 0, '2012-09-08 14:26:08', 39, '2012-09-08 14:41:22', 39, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, 'en-GB', '');
