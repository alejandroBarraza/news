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

import com.github.javafaker.Faker;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.threeten.bp.ZoneId;
import org.threeten.bp.ZonedDateTime;

import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.atomic.AtomicBoolean;

import cl.ucn.disc.dsm.abarraza.news.model.News;

public final class ContratcsImplFaker implements Contracts {
    /**
     * the logger
     */
    private static final Logger log = LoggerFactory.getLogger(ContratcsImplFaker.class);
    /**
     * the list of news.
     */
    private final List<News> theNews = new ArrayList<>();

    /**
     * the constructor :Generate 5 {@link News}
     */
    public ContratcsImplFaker(){
        final Faker faker = Faker.instance();
        for (int i = 0; i <5 ; i++) {
            this.theNews.add(new News(
                    //Integer.toUnsignedLong(i),
                    faker.book().title(),
                    faker.name().username(),
                    faker.name().fullName(),
                    faker.internet().url(),
                    faker.internet().avatar(),
                    faker.harryPotter().quote(),
                    faker.lorem().paragraph(3),
                    ZonedDateTime.now(ZoneId.of("-3"))

            ));

        }

    }

    /**
     * get thie lis of news
     *
     * @param size size of the list
     * @return the lisf of news
     */
    @Override
    public List<News> retrieveNews(final Integer size) {
        //the last "size" elements.
        return theNews.subList(theNews.size() - size,theNews.size());
    }

    /**
     * Save on News intro the system
     *
     * @param news to save
     */
    @Override
    public void saveNews(final News news) {
        //FIXME:don't allow duplicates.
        //fix duplicate news.
        AtomicBoolean isDuplicate = new AtomicBoolean(false);
        for(News n: this.theNews){
            //FIXME:fix equals in the future.have to compare with id.
            if(n.getTitle().equals(news.getTitle())){
                isDuplicate.set(true);
                throw new IllegalArgumentException("duplicates news!");
            }
        }
        //add the news if is not repeat.
        if(!isDuplicate.get()){
            this.theNews.add(news);
        }
        //this.theNews.add(news);

    }
    //the faker to use

}
