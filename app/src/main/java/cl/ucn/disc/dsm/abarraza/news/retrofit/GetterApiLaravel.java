package cl.ucn.disc.dsm.abarraza.news.retrofit;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;

public interface GetterApiLaravel {
    @GET("posts")
    Call<List<LaravelNews>> getPosts();
}
