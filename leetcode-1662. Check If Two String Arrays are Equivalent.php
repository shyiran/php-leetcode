class Solution {

/**
 * @param String[] $word1
 * @param String[] $word2
 * @return Boolean
 */
function arrayStringsAreEqual($word1, $word2) {
    return join($word1)==join($word2);
}
}