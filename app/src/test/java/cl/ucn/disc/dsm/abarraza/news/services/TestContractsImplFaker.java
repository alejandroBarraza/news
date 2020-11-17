/*
 * Copyright 2020 alejandro barraza alejandro.barraza@alumnos.ucn.cl
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

package cl.ucn.disc.dsm.abarraza.news.services;

import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.util.List;

import cl.ucn.disc.dsm.abarraza.news.model.News;

public final class TestContractsImplFaker {
    /**
     * the logger
     */
    private static final Logger log = LoggerFactory.getLogger(TestContractsImplFaker.class);
    /**
     * the test of retrieve news.
     */
    @Test
    public  void testRetrieveNews(){
        log.debug("testing..");
        //the concrete implementation.
        Contracts contracts = new ContratcsImplFaker();
        //call the method
        List<News> news = contracts.retrieveNews(5);
        //the list cant be null.
        Assertions.assertNotNull(news,"list was null :(");
        //the list cant be empty
        Assertions.assertFalse(news.isEmpty(),"empty list?");
        // the size(list)==5
        Assertions.assertEquals(5,news.size(),"list size != 5");
        for (News n: news) {
            log.debug("News:{}",n);

        }
        //size 0
        Assertions.assertEquals(0,contracts.retrieveNews(0).size(),"list !=0");
        //size =3
        Assertions.assertEquals(3,contracts.retrieveNews(3).size(),"list !=3");
        //size =10
        Assertions.assertTrue(contracts.retrieveNews(10).size()<=10,"lis!=10");
        log.debug("Done.");


    }
}
