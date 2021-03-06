<?php
/**
 * 希尔排序
 * 基本思想：
 * 先取一个小于n的整数d1作为第一个增量，把文件的全部记录分成d1个组。
 * 所有距离为dl的倍数的记录放在同一个组中。
 * 先在各组内进行直接插人排序；
 * 然后，取第二个增量d2<d1重复上述的分组和排序，
 * 直至所取的增量dt=1(dt<dt-l<…<d2<d1)，
 * 即所有记录放在同一组中进行直接插入排序为止。
 * 该方法实质上是一种分组插入方法。
 * 希尔排序是不稳定的
 */
function shellSort(array $list)
{
	$length = count($list);
	$step = 2;
	$gap = intval($length/$step);
	while($gap > 0){
		for($gap_i = 0; $gap_i < $gap; $gap_i++){
			for($i = $gap_i; $i < $length; $i+=$gap){
				$temp = $list[$i];
				for($j = $i - $gap; $j >= 0; $j-=$gap){
					if($temp < $list[$j]){
						$list[$j+$gap] = $list[$j];
						$list[$j] = $temp;
					}else{
						break;
					}
				}
			}
		}
	}
	return $list;
}

$list = array(3, 6, 2, 4, 10, 1 ,9, 8, 5, 7);
var_dump(shellSort($list));
/**
 * 第1趟, gap = 5
 * 分成了两个数组：(对应下标元素进行比较)
 * (3, 6, 2, 4, 10) (1, 9, 8, 5, 7)
 * 交换后的过程：
 * (1, ...) (3, ...)
 * (1, 6, ...) (3, 9, ...)
 * (1, 6, 2, ...) (3, 9, 8, ...)
 * (1, 6, 2, 4, ...) (3, 9, 8, 5, ...)
 * (1, 6, 2, 4, 7) (3, 9, 8, 5, 10)
 * 第2趟，gap = 2
 * 分成了五个数组
 * (1, 6) (2, 4) (7, 3) (9, 8) (5, 10)
 * 交换过程
 * (1, ...) (2, ...) (5, ...) (7, ...) (9, ...)
 * (1, 3) (2, 4) (5, 6) (7, 8) (9, 10)
 * 第3趟， gap = 1
 * 元素比较
 * 1, 2, 3, 4, 5, 6, 7, 8, 9, 10
 */