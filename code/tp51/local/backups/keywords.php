<?php

$php_keywords_regx = <<<REGX
\b(
(a(bstract|nd|rray|s))|
(c(a(llable|se|tch)|l(ass|one)|on(st|tinue)))|
(d(e(clare|fault)|ie|o))|
(e(cho|lse(if)?|mpty|nd(declare|for(each)?|if|switch|while)|val|x(it|tends)))|
(f(inal|or(each)?|unction))|
(g(lobal|oto))|
(i(f|mplements|n(clude(_once)?|st(anceof|eadof)|terface)|sset))|
(n(amespace|ew))|
(p(r(i(nt|vate)|otected)|ublic))|
(re(quire(_once)?|turn))|
(s(tatic|witch))|
(t(hrow|r(ait|y)))|
(u(nset|se))|
(__halt_compiler|break|list|(x)?or|var|while)
)\b
REGX;
